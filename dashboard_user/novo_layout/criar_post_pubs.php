<?php
include "../functions/funcoes_bd.php";
abre_base_dados($lig);
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../index.php");
}

    //receber os dados do formulario
    $nome = $_SESSION['nome'];
    $mensagem = mysqli_real_escape_string($lig, $_POST['mensagem']);
    $id= $_SESSION['id'];

    if (empty($mensagem)) {
        array_push($errors, "Mensagem é obrigatória");
    }

    $query = "INSERT INTO posts_historico (nome,descricao,users_id) VALUES ('$nome','$mensagem','$id')";
    mysqli_query($lig, $query);
    echo $query;