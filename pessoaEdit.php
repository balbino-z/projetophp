<?php
include_once("cabec.php");

$data = $_REQUEST;
extract($data);

$id = isset($id) ? $id : '';

if(empty($id)) {
    header('location: pessoa.php');
    exit;
}

include_once("config.php");
$conexao = db_connect();

// Buscar dados da pessoa
$sql = "SELECT * FROM pessoa WHERE pesNome = :id";
$comando = $conexao->prepare($sql);
$comando->bindParam(':id', $id);
$comando->execute();

if($comando->rowCount() == 0) {
    header('location: pessoa.php');
    exit;
}

$pessoa = $comando->fetch(PDO::FETCH_OBJ);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h2 class="text-center mb-4">Editar Pessoa</h2>

      <form action="pessoaUpdate.php" method="POST">
        <input type="hidden" name="id_original" value="<?= htmlspecialchars($pessoa->pesNome) ?>">
        
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome:</label>
              <input type="text" name="nome" id="nome" class="form-control" 
                     value="<?= htmlspecialchars($pessoa->pesNome) ?>" required>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="mb-3">
              <label for="tipo" class="form-label">Tipo:</label>
              <select name="tipo" id="tipo" class="form-control" required>
                <option value="F" <?= $pessoa->pesTipo == 'F' ? 'selected' : '' ?>>Física</option>
                <option value="J" <?= $pessoa->pesTipo == 'J' ? 'selected' : '' ?>>Jurídica</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="cidade" class="form-label">Cidade:</label>
              <input type="text" name="cidade" id="cidade" class="form-control" 
                     value="<?= htmlspecialchars($pessoa->pesCidade) ?>">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="mb-3">
              <label for="estado" class="form-label">Estado:</label>
              <input type="text" name="estado" id="estado" class="form-control" 
                     value="<?= htmlspecialchars($pessoa->pesEstado) ?>">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="endereco" class="form-label">Endereço:</label>
          <input type="text" name="endereco" id="endereco" class="form-control" 
                 value="<?= htmlspecialchars($pessoa->pesEndereco) ?>">
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="telefone" class="form-label">Telefone:</label>
              <input type="text" name="telefone" id="telefone" class="form-control" 
                     value="<?= htmlspecialchars($pessoa->pesTelefone) ?>">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="mb-3">
              <label for="email" class="form-label">E-mail:</label>
              <input type="email" name="email" id="email" class="form-control" 
                     value="<?= htmlspecialchars($pessoa->pesEmail) ?>">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label">Classificações:</label>
          <div class="row">
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cliente" value="S" 
                       <?= $pessoa->pesCliente == 'S' ? 'checked' : '' ?> id="cliente">
                <label class="form-check-label" for="cliente">Cliente</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="fornecedor" value="S" 
                       <?= $pessoa->pesFornecedor == 'S' ? 'checked' : '' ?> id="fornecedor">
                <label class="form-check-label" for="fornecedor">Fornecedor</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="funcionario" value="S" 
                       <?= $pessoa->pesFunc == 'S' ? 'checked' : '' ?> id="funcionario">
                <label class="form-check-label" for="funcionario">Funcionário</label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="transportadora" value="S" 
                       <?= $pessoa->pesTransp == 'S' ? 'checked' : '' ?> id="transportadora">
                <label class="form-check-label" for="transportadora">Transportadora</label>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success px-4 me-2">Atualizar</button>
          <a href="pessoa.php" class="btn btn-secondary px-4">Cancelar</a>
        </div>
      </form>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
include_once("rodape.php");
?>