<?php

$data = $_REQUEST;
extract($data);

$id = isset($id) ? $id : '';

if(empty($id)) {
    header('location: pessoa.php');
    exit;
}

include_once("config.php");
$conexao = db_connect();

// Verificar se a pessoa existe
$sql = "SELECT pesNome FROM pessoa WHERE pesNome = :id";
$comando = $conexao->prepare($sql);
$comando->bindParam(':id', $id);
$comando->execute();

if($comando->rowCount() == 0) {
    header('location: pessoa.php');
    exit;
}

// Excluir a pessoa
$sql = "DELETE FROM pessoa WHERE pesNome = :id";
$comando = $conexao->prepare($sql);
$comando->bindParam(':id', $id);
$comando->execute();

header('location: pessoa.php');

?>