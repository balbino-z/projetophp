<?php

$data = $_REQUEST;
extract($data);

include_once("config.php");
$conexao = db_connect();

$sql = "INSERT INTO produto (proDescricao, proQuantidade, proValor, proSetor, proStatus) 
        VALUES (:descricao, :quantidade, :valor, :setor, :status)";

$comando = $conexao->prepare($sql);

$comando->bindParam(':descricao', $descricao);
$comando->bindParam(':quantidade', $quantidade);
$comando->bindParam(':valor', $valor);
$comando->bindParam(':setor', $setor);
$comando->bindParam(':status', $status);

$comando->execute();

header('location: produto.php');

?>