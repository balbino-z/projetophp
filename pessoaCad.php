<?php
    include_once("cabec.php");
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <h2 class="text-center mb-4">Dados da Pessoa</h2>

      <form action="pessoaGrava.php" method="GET">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-4">
          <label for="tipo" class="form-label">Tipo:</label>
          <input type="text" name="tipo" id="tipo" list="optipo" class="form-control" required>
          <datalist id="optipo">
            <option value="F">Física</option>
            <option value="J">Jurídica</option>
          </datalist>
        </div>

        <div class="text-center">
          <input type="submit" value="Gravar" class="btn btn-dark px-4">
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
    include_once("rodape.php");
?>
