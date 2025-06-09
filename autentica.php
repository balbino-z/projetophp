<?php

	$data = $_REQUEST;

	extract($data);

	include_once("config.php");

	$conexao = db_connect();

	$sql = "select usuCodigo, usuNome
			  from usuario
			 where usuMail = :email
			   and usuSenha = :senha ";
	
	$comando = $conexao->prepare($sql);

	$comando->bindParam(':email', $email);
	$comando->bindParam(':senha', $senha);

	$comando->execute();

	if( $comando->rowCount() == 1 )
	{
		$dados = $comando->fetch(PDO::FETCH_OBJ);

		$usuCodigo  = $dados->usuCodigo;
		$usuNome 	= $dados->usuNome;

		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['usuCodigo'] = $usuCodigo;
		$_SESSION['usuNome']   = $usuNome;
		$_SESSION['TEMPO'] = time();
		
		header('location: .');
	}
	else
	{
		header('location: login_erro.php');
	}
?>