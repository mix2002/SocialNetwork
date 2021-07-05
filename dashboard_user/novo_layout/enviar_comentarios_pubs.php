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
$comentario = mysqli_real_escape_string($lig, $_POST['comentario']);
$id= $_SESSION['id'];

if (empty($comentario)) {
    array_push($errors, "Comentario é obrigatório");
}

$query = "INSERT INTO posts_comentarios (comentario,nome,users_id) VALUES ('$comentario','$nome','$id')";
mysqli_query($lig, $query);
echo $query;