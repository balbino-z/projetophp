<?php
  include_once("cabec.php");
?>

    <div id="container" class="row justify-content-center">
      <h2>Acesso ao Sistema</h2>

      <div id="login" class="col-sm-12 col-md-12 col-lg-8 bg-light">
        <form name="dados" action="autentica.php" method="GET">
          <div>
            <label for="email" class="col-2 text-end">e-mail: </label>
            <input type="email" name="email" class="col-9">
          </div>

          <div class="col-12">
            &nbsp;
          </div>

          <div class="form-group">
            <label for="senha" class="col-2 text-end">Senha: </label>
            <input type="password" name="senha" class="col-9">
          </div>

          <div class="col-12">
            &nbsp;
          </div>

          <div class="text-center">
            <button type="submit" name="btnEnviar" class="col-lg-2 col-sm-12 col-md-12 btn btn-dark">Entrar</button>
          </div>
        </form>
      </div>

    </div>

<?php
  include_once("rodape.php");
?>