<?php

session_start();

// inicializar variáveis
$id = 0;
$nome = "";
$endereco = "";
$cidade = "";
$estado = "";
$pais = "";
$edicao = false;

// base de dados
$db = mysqli_connect('localhost', 'root', '', 'crud');

// insert
if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    $query = "INSERT INTO info (NOME, ENDERECO, CIDADE, ESTADO, PAIS) VALUES ('$nome', '$endereco', '$cidade', '$estado', '$pais');";    
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Endereço salvo com sucesso!";
    header('location: index.php'); // redireciona para a página inicial depois do insert
}

// select
$resultados = mysqli_query($db, "SELECT * FROM info");

// update
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    mysqli_query($db, "UPDATE info SET NOME='$nome', ENDERECO='$endereco', CIDADE='$cidade', ESTADO='$estado', PAIS='$pais' WHERE ID=$id;");
    $_SESSION['msg'] = "Endereço atualizado com sucesso!";
    header('location: index.php');
}

// delete
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];

    mysqli_query($db, "DELETE FROM info WHERE ID=$id;");
    $_SESSION['msg'] = "Endereço excluído com sucesso!";
    header('location: index.php');
}
