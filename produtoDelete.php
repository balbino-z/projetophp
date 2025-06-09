<?php
include_once("config.php");

// Pega o ID do produto a ser excluído
$id = $_GET['id'] ?? '';

// Verifica se o ID existe
if(empty($id)) {
    header('location: produto.php?erro=1'); // Redireciona se não tiver ID
    exit;
}

try {
    // Conecta ao banco
    $conexao = db_connect();
    
    // Prepara e executa a query de exclusão
    $sql = "DELETE FROM produto WHERE proCodigo = :id";
    $comando = $conexao->prepare($sql);
    $comando->bindParam(':id', $id);
    $comando->execute();
    
    // Redireciona com mensagem de sucesso
    header('location: produto.php?sucesso=2');
    
} catch(PDOException $e) {
    // Redireciona com mensagem de erro se falhar
    header('location: produto.php?erro=2');
}
?>