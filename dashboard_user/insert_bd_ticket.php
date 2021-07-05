<?php
include "functions/funcoes_bd.php";
abre_base_dados($lig);
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../index.php");
}

if (isset($_POST['ticket-submit'])) {

    //receber os dados do formulario
    $assunto = mysqli_real_escape_string($lig, $_POST['assunto']);
    $mensagem = mysqli_real_escape_string($lig, $_POST['mensagem']);
    $prioridade = mysqli_real_escape_string($lig, $_POST['prioridade']);
    $admin= $_SESSION['admin'];
    $id= $_SESSION['id'];

    if (empty($assunto)) {
        array_push($errors, "Assunto é obrigatório");
    }
    if (empty($prioridade)) {
        array_push($errors, "Prioridade é obrigatória");
    }
    if (empty($mensagem)) {
        array_push($errors, "Mensagem é obrigatória");
    }

        $query = "INSERT INTO tickets (assunto,mensagem,prioridade,lido,admin,users_id) VALUES ('$assunto','$mensagem','$prioridade',0,'$admin','$id')";
        mysqli_query($lig, $query);


        echo $query;
        header('location: index.php');


}