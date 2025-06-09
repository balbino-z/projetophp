<?php
  include_once("cabec.php");
?>

    <div id="container">
      <h3>Técnicas Avançadas de Programação Web e Mobile</h3>

      <p>&nbsp;</p>

      <h4>
        <?php
          if( isset( $_SESSION['nome'] ) )
          {
            echo "Usuário: " . $_SESSION['nome'];
          }
          else
          {
            echo "Usuário Desconectado";
          }
        ?>
      </h4>
    </div>

<?php
  include_once("rodape.php");
?>