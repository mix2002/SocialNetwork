<?php
session_start();
include "functions/funcoes_bd.php";
abre_base_dados($lig);
if(!isset($_SESSION['id']))
{
    header("Location: ../index.php");
}
$id= $_SESSION['id'];
$sql2 = "UPDATE utilizadores SET online = 0 WHERE id='$id'";
mysqli_query($lig, $sql2);
if ($lig->query($sql2) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $lig->error;
}
session_destroy();
unset ($_SESSION['id']);
unset ($_SESSION['nome']);
unset ($_SESSION['apelido']);
unset ($_SESSION['email']);
unset ($_SESSION['admin']);
unset ($_SESSION['online']);
header("Location: index.php");
