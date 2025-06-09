<?php

$data = $_REQUEST;
extract($data);

include_once("config.php");
$conexao = db_connect();

// Processar checkboxes
$cliente = isset($cliente) ? $cliente : 'N';
$fornecedor = isset($fornecedor) ? $fornecedor : 'N';
$funcionario = isset($funcionario) ? $funcionario : 'N';
$transportadora = isset($transportadora) ? $transportadora : 'N';

$sql = "UPDATE pessoa SET 
            pesNome = :nome,
            pesTipo = :tipo,
            pesCidade = :cidade,
            pesEstado = :estado,
            pesEndereco = :endereco,
            pesTelefone = :telefone,
            pesEmail = :email,
            pesCliente = :cliente,
            pesFornecedor = :fornecedor,
            pesFunc = :funcionario,
            pesTransp = :transportadora
        WHERE pesNome = :id_original";

$comando = $conexao->prepare($sql);

$comando->bindParam(':nome', $nome);
$comando->bindParam(':tipo', $tipo);
$comando->bindParam(':cidade', $cidade);
$comando->bindParam(':estado', $estado);
$comando->bindParam(':endereco', $endereco);
$comando->bindParam(':telefone', $telefone);
$comando->bindParam(':email', $email);
$comando->bindParam(':cliente', $cliente);
$comando->bindParam(':fornecedor', $fornecedor);
$comando->bindParam(':funcionario', $funcionario);
$comando->bindParam(':transportadora', $transportadora);
$comando->bindParam(':id_original', $id_original);

$comando->execute();

header('location: pessoa.php');

?>