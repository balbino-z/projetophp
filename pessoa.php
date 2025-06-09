<?php
  include_once("cabec.php");

  $data = $_REQUEST;
  extract($data);

  $pesquisa = isset($pesquisa) ? "%" . $pesquisa . "%" : "%";

  include_once("config.php");
  $conexao = db_connect();

  $sql = "SELECT pesNome, pesTipo, 
                 pesCliente, pesFornecedor, pesFunc, pesTransp,
                 pesCidade
          FROM pessoa
          WHERE pesNome LIKE :pesquisa
          ORDER BY pesNome";

  $comando = $conexao->prepare($sql);
  $comando->bindParam(':pesquisa', $pesquisa);
  $comando->execute();

  $dados = $comando->fetchAll(PDO::FETCH_OBJ);
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<div class="container mt-4">
  <h3 class="text-center mb-4">Cadastro de Pessoas</h3>

  <form class="row g-3 mb-4" name="pesquisa" action="pessoa.php" method="GET">
    <div class="col-md-6">
      <label for="pesquisa" class="form-label">Nome a pesquisar</label>
      <input 
        type="text" 
        class="form-control" 
        id="pesquisa" 
        name="pesquisa" 
        placeholder="Digite o nome"
        value="<?= htmlspecialchars($_GET['pesquisa'] ?? '') ?>"
      >
    </div>
    <div class="col-md-6 d-flex align-items-end gap-2">
      <button type="submit" class="btn btn-primary">Pesquisar</button>
      <a href="pessoa.php" class="btn btn-secondary">Limpar</a>
      <a href="pessoaCad.php?op=I" class="btn btn-dark">Novo Registro</a>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center align-middle">
      <thead class="table-dark">
        <tr>
          <th>Nome</th>
          <th>Tipo</th>
          <th>Cli</th>
          <th>For</th>
          <th>Fun</th>
          <th>Tra</th>
          <th>Cidade</th>
          <th>Opções</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($dados) === 0): ?>
          <tr>
            <td colspan="8" class="text-center text-muted">Nenhum registro encontrado.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($dados as $linha): ?>
            <tr>
              <td><?= htmlspecialchars($linha->pesNome); ?></td>
              <td><?= $linha->pesTipo == 'F' ? 'Fis' : 'Jur'; ?></td>
              <td><?= $linha->pesCliente; ?></td>
              <td><?= $linha->pesFornecedor; ?></td>
              <td><?= $linha->pesFunc; ?></td>
              <td><?= $linha->pesTransp; ?></td>
              <td><?= htmlspecialchars($linha->pesCidade); ?></td>
              <td class="d-flex justify-content-center gap-2 flex-wrap">
                <a href="pessoaEdit.php?id=<?= urlencode($linha->pesNome); ?>" class="btn btn-warning">
                  Editar
                </a>
                <a href="pessoaDelete.php?id=<?= urlencode($linha->pesNome); ?>" class="btn btn-danger" onclick="return confirm('Confirma exclusão?')">
                  Excluir
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once("rodape.php"); ?>
