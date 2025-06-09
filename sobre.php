<?php
  include_once("cabec.php");
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center mb-4"><?php echo $lng['sobre']; ?></h2>
      
      <div class="card">
        <div class="card-header bg-dark text-white">
          <h4>Sistema de Gestão FATEC Americana</h4>
        </div>
        <div class="card-body">
          <h5>Técnicas Avançadas de Programação Web e Mobile</h5>
          
          <p><strong>Sobre o Sistema:</strong></p>
          <p>Este sistema foi desenvolvido como parte da disciplina de Técnicas Avançadas de Programação Web e Mobile da FATEC Americana. O objetivo é demonstrar a implementação de um sistema completo de gestão empresarial utilizando tecnologias web modernas.</p>
          
          <p><strong>Funcionalidades:</strong></p>
          <ul>
            <li>Sistema de autenticação seguro com controle de sessão</li>
            <li>Cadastro e gestão de pessoas (clientes, fornecedores, funcionários, transportadoras)</li>
            <li>Controle de produtos organizados por setores</li>
            <li>Sistema multilíngue (Português, Inglês, Espanhol)</li>
            <li>Interface responsiva com Bootstrap 5</li>
            <li>API REST para consulta de dados</li>
          </ul>
          
          <p><strong>Tecnologias Utilizadas:</strong></p>
          <ul>
            <li>PHP 7+ com PDO</li>
            <li>MySQL Database</li>
            <li>HTML5, CSS3, JavaScript</li>
            <li>Bootstrap 5</li>
            <li>Sistema de Sessões PHP</li>
            <li>Cookies para preferências</li>
          </ul>
          
          <div class="row mt-4">
            <div class="col-md-6">
              <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                  <h6>FATEC Americana</h6>
                </div>
                <div class="card-body">
                  <p>Faculdade de Tecnologia de Americana</p>
                  <p><strong>Curso:</strong> Análise e Desenvolvimento de Sistemas</p>
                  <p><strong>Disciplina:</strong> Técnicas Avançadas de Programação Web e Mobile</p>
                </div>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="card border-success">
                <div class="card-header bg-success text-white">
                  <h6>Informações do Sistema</h6>
                </div>
                <div class="card-body">
                  <p><strong>Versão:</strong> 1.0</p>
                  <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                  <p><strong>Status:</strong> Em Desenvolvimento</p>
                  <p><strong>Ambiente:</strong> Acadêmico</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include_once("rodape.php");
?>