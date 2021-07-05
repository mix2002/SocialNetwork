<?php
include "functions/funcoes_bd.php";
session_start();
abre_base_dados($lig);


if(!isset($_SESSION['id']))
{
    header("Location: ../index.php");
}

//receber os dados do formulário
$id = mysqli_real_escape_string($lig, $_SESSION['id']);
$nome = mysqli_real_escape_string($lig, $_POST['nome']);
$apelido = mysqli_real_escape_string($lig, $_POST['apelido']);
$email = mysqli_real_escape_string($lig, $_POST['email']);
$password = mysqli_real_escape_string($lig, $_POST['password']);


if (isset($_POST['edit-submit'])) {

    $email_db = $_SESSION['email'];
    $user_check_query = "SELECT * FROM utilizadores WHERE email='$email' LIMIT 1";
    $result = mysqli_query($lig, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    $errors = array();
    alerta("teste2");
    if ($email) {//já existe
        if ($email !== $email_db) {
            array_push($errors, "Email já registrado");
            alerta("t");
        }
        alerta("teste3");
    }

    if (count($errors) == 0) {
        alerta("teste4");
        $password = password_hash($password, PASSWORD_BCRYPT); //encriptar

        $query = "UPDATE utilizadores SET nome='$nome', apelido='$apelido', email='$email',password='$password' WHERE id='$id'";
        mysqli_query($lig, $query);
        $_SESSION['nome'] = "$nome";
        $_SESSION['apelido'] = "$apelido";
        $_SESSION['email'] = "$email";
        $_SESSION['password'] = "$password";
        //echo $nome;
        header('location: perfil_editar.php');
    }
}
