<?php
include_once("config.php");

// Pega todos os dados do formulário
$data = $_POST;
extract($data);

// Validação básica dos campos
if(empty($id) || empty($descricao) || !isset($quantidade) || !isset($valor)) {
    header('location: produto.php?erro=1'); // Campos obrigatórios faltando
    exit;
}

try {
    // Conecta ao banco
    $conexao = db_connect();
    
    // Query de atualização
    $sql = "UPDATE produto SET 
            proDescricao = :descricao,
            proQuantidade = :quantidade,
            proValor = :valor
            WHERE proCodigo = :id";
    
    // Prepara e executa a query
    $comando = $conexao->prepare($sql);
    $comando->bindParam(':descricao', $descricao);
    $comando->bindParam(':quantidade', $quantidade);
    $comando->bindParam(':valor', $valor);
    $comando->bindParam(':id', $id);
    $comando->execute();
    
    // Redireciona com mensagem de sucesso
    header('location: produto.php?sucesso=1');
    
} catch(PDOException $e) {
    // Redireciona com mensagem de erro se falhar
    header('location: produto.php?erro=3');
}
?>