<!doctype html>
<?php
  session_start();

	if( ! isset( $_COOKIE['idioma'] ) )
	{
		$_COOKIE['idioma'] = 'pt';
	}

	if(file_exists(strtolower( './idioma/'. $_COOKIE['idioma'] ) . '.lang'))
	{
    	$lng = parse_ini_file( './idioma/' . strtolower( $_COOKIE['idioma'] ) . '.lang' );
	}
	else
	{
		$lng = parse_ini_file('./idioma/pt.lang');
	}
?>
<html lang="pt-BR">
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="styles.css">
    
    <title>FATEC Americana - Sistema de Gestão</title>
</head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Fatec Americana</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href=".">Home</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastro
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="pessoa.php">Pessoa</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Produto</a></li>
                <li><a class="dropdown-item" href="#">Serviço</a></li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="sobre.php"><?php echo $lng['sobre']; ?></a>
            </li>
          </ul>

          <div>
					  <a href="idioma.php"><img src="./icones/<?php echo $_COOKIE['idioma']; ?>.png" width="40px"></a>
				  </div>
          
          <div class="d-flex">
            <a class="btn btn-dark" href="desconectar.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
