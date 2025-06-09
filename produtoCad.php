<?php
include_once("cabec.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <h2 class="text-center mb-4">Cadastrar Produto</h2>

      <form action="produtoGrava.php" method="POST">
        
        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição do Produto:</label>
          <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="quantidade" class="form-label">Quantidade:</label>
              <input type="number" name="quantidade" id="quantidade" class="form-control" 
                     step="0.01" min="0" value="0" required>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="mb-3">
              <label for="valor" class="form-label">Valor Unitário:</label>
              <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="number" name="valor" id="valor" class="form-control" 
                       step="0.01" min="0" value="0" required>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="setor" class="form-label">Setor:</label>
              <select name="setor" id="setor" class="form-control" required>
                <option value="">Selecione um setor</option>
                <option value="informatica">Informática</option>
                <option value="mobiliario">Mobiliário</option>
                <option value="material_escolar">Material Escolar</option>
                <option value="audiovisual">Audiovisual</option>
                <option value="rede">Rede</option>
                <option value="escritorio">Escritório</option>
                <option value="limpeza">Limpeza</option>
                <option value="manutencao">Manutenção</option>
              </select>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="mb-3">
              <label for="status" class="form-label">Status:</label>
              <select name="status" id="status" class="form-control" required>
                <option value="A" selected>Ativo</option>
                <option value="I">Inativo</option>
              </select>
            </div>
          </div>
        </div>

        <div class="mb-4">
          <div class="card bg-light">
            <div class="card-body">
              <h6>Valor Total Calculado:</h6>
              <p id="valor_total" class="h5 text-success">R$ 0,00</p>
            </div>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success px-4 me-2">Cadastrar</button>
          <a href="produto.php" class="btn btn-secondary px-4">Cancelar</a>
        </div>
      </form>

    </div>
  </div>
</div>

<script>
// Calcular valor total automaticamente
function calcularTotal() {
  const quantidade = parseFloat(document.getElementById('quantidade').value) || 0;
  const valor = parseFloat(document.getElementById('valor').value) || 0;
  const total = quantidade * valor;
  
  document.getElementById('valor_total').textContent = 
    'R$ ' + total.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

document.getElementById('quantidade').addEventListener('input', calcularTotal);
document.getElementById('valor').addEventListener('input', calcularTotal);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
include_once("rodape.php");
?>