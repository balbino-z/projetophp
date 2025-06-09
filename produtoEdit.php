<?php
include_once("cabec.php");

$data = $_REQUEST;
extract($data);

$id = isset($id) ? $id : '';

if(empty($id)) {
    header('location: produto.php');
    exit;
}

include_once("config.php");
$conexao = db_connect();

// Buscar dados do produto
$sql = "SELECT * FROM produto WHERE proCodigo = :id";
$comando = $conexao->prepare($sql);
$comando->bindParam(':id', $id);
$comando->execute();

if($comando->rowCount() == 0) {
    header('location: produto.php');
    exit;
}

$produto = $comando->fetch(PDO::FETCH_OBJ);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h2 class="text-center mb-4">Editar Produto</h2>

      <form action="produtoUpdate.php" method="POST">
        <input type="hidden" name="id" value="<?= $produto->proCodigo ?>">
        
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição do Produto:</label>
          <input type="text" name="descricao" id="descricao" class="form-control" 
                 value="<?= htmlspecialchars($produto->proDescricao) ?>" required>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="quantidade" class="form-label">Quantidade:</label>
              <input type="number" name="quantidade" id="quantidade" class="form-control" 
                     step="1" min="0" value="<?= $produto->proQuantidade ?>" required>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="mb-3">
              <label for="valor" class="form-label">Valor Unitário (R$):</label>
              <input type="number" name="valor" id="valor" class="form-control" 
                     step="0.01" min="0" value="<?= $produto->proValor ?>" required>
            </div>
          </div>
        </div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Atualizar Produto</button>
          <a href="produto.php" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
include_once("rodape.php");