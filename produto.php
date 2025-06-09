<?php
  include_once("cabec.php");

if(isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
    echo '<div class="alert alert-success">Produto atualizado com sucesso!</div>';
}

if(isset($_GET['erro'])) {
    $erro = (int)$_GET['erro'];
    $mensagem = match($erro) {
        1 => 'Preencha todos os campos!',
        2 => 'Nenhuma alteração realizada',
        3 => 'Erro no banco de dados',
        default => 'Erro desconhecido'
    };
    echo '<div class="alert alert-danger">' . $mensagem . '</div>';
}
  $data = $_REQUEST;
  extract($data);

  $pesquisa = isset($pesquisa) ? "%" . $pesquisa . "%" : "%";
  $setor_filtro = isset($setor_filtro) ? $setor_filtro : "";

  include_once("config.php");
  $conexao = db_connect();

  // SQL base
  $sql = "SELECT proCodigo, proDescricao, proQuantidade, proValor, proSetor, proStatus
          FROM produto
          WHERE proDescricao LIKE :pesquisa";
  
  // Adicionar filtro de setor se selecionado
  if(!empty($setor_filtro)) {
    $sql .= " AND proSetor = :setor";
  }
  
  $sql .= " ORDER BY proDescricao";

  $comando = $conexao->prepare($sql);
  $comando->bindParam(':pesquisa', $pesquisa);
  
  if(!empty($setor_filtro)) {
    $comando->bindParam(':setor', $setor_filtro);
  }
  
  $comando->execute();
  $dados = $comando->fetchAll(PDO::FETCH_OBJ);

  // Buscar setores para o filtro
  $sql_setores = "SELECT DISTINCT proSetor FROM produto WHERE proSetor IS NOT NULL ORDER BY proSetor";
  $cmd_setores = $conexao->prepare($sql_setores);
  $cmd_setores->execute();
  $setores = $cmd_setores->fetchAll(PDO::FETCH_OBJ);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<div class="container mt-4">
  <h3 class="text-center mb-4">Gestão de Produtos</h3>

  <form class="row g-3 mb-4" name="pesquisa" action="produto.php" method="GET">
    <div class="col-md-4">
      <label for="pesquisa" class="form-label">Produto a pesquisar</label>
      <input 
        type="text" 
        class="form-control" 
        id="pesquisa" 
        name="pesquisa" 
        placeholder="Digite o nome do produto"
        value="<?= htmlspecialchars($_GET['pesquisa'] ?? '') ?>"
      >
    </div>
    
    <div class="col-md-4">
      <label for="setor_filtro" class="form-label">Filtrar por Setor</label>
      <select class="form-control" id="setor_filtro" name="setor_filtro">
        <option value="">Todos os setores</option>
        <?php foreach($setores as $setor): ?>
          <option value="<?= htmlspecialchars($setor->proSetor) ?>" 
                  <?= ($setor_filtro == $setor->proSetor) ? 'selected' : '' ?>>
            <?= ucwords(str_replace('_', ' ', $setor->proSetor)) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <div class="col-md-4 d-flex align-items-end gap-2">
      <button type="submit" class="btn btn-primary">Pesquisar</button>
      <a href="produto.php" class="btn btn-secondary">Limpar</a>
      <a href="produtoCad.php" class="btn btn-dark">Novo Produto</a>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>Código</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th>Valor</th>
          <th>Setor</th>
          <th>Status</th>
          <th>Valor Total</th>
          <th>Opções</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($dados) === 0): ?>
          <tr>
            <td colspan="8" class="text-center text-muted">Nenhum produto encontrado.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($dados as $linha): ?>
            <tr>
              <td><?= $linha->proCodigo; ?></td>
              <td class="text-start"><?= htmlspecialchars($linha->proDescricao); ?></td>
              <td><?= number_format($linha->proQuantidade, 2, ',', '.'); ?></td>
              <td>R$ <?= number_format($linha->proValor, 2, ',', '.'); ?></td>
              <td><?= ucwords(str_replace('_', ' ', $linha->proSetor)); ?></td>
              <td>
                <span class="badge <?= $linha->proStatus == 'A' ? 'bg-success' : 'bg-danger' ?>">
                  <?= $linha->proStatus == 'A' ? 'Ativo' : 'Inativo' ?>
                </span>
              </td>
              <td>R$ <?= number_format($linha->proQuantidade * $linha->proValor, 2, ',', '.'); ?></td>
              <td class="d-flex justify-content-center gap-2 flex-wrap">
                <a href="produtoEdit.php?id=<?= $linha->proCodigo; ?>" class="btn btn-warning btn-sm">
                  Editar
                </a>
                <a href="produtoDelete.php?id=<?= $linha->proCodigo; ?>" class="btn btn-danger btn-sm" 
                   onclick="return confirm('Confirma exclusão do produto?')">
                  Excluir
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  
  <?php if(count($dados) > 0): ?>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="alert alert-info">
          <strong>Total de produtos encontrados:</strong> <?= count($dados) ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once("rodape.php"); ?>