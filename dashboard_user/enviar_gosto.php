<?php
include "functions/funcoes_bd.php";
abre_base_dados($lig);
session_start();
$id = $_SESSION['id'];


if(!isset($_SESSION['id']))
{
    header("Location: ../index.php");
}


if (isset($_POST['article'])) {
    $count = mysqli_query($lig, "SELECT * FROM `post_likes` WHERE `id_post`=" . $_POST['article'] . " AND `user_id`=" . $id);

    if ($rows = mysqli_num_rows($count) <= 0) {
        mysqli_query($lig, "INSERT INTO `post_likes` (`id_post`, `user_id`) VALUES (" . $_POST['article'] . ", " . $id . ")");
        echo mysqli_error($lig);
    } else {
        echo "Não gosto";
        mysqli_query($lig, "DELETE FROM `post_likes` WHERE `id_post`=" . $_POST['article']);
        echo mysqli_error($lig);
    }
}



//
//
//
////receber dados da base de dados
//$sql = "SELECT * FROM posts_historico";
//$result = mysqli_query($lig, $sql);
//
//$post_id = $_POST['article'];
//
//
//
//$post_checker= "SELECT * FROM post_likes_counter WHERE post_id=$post_id";
//$result_post= mysqli_query($lig,$post_checker);
//// */ //
//
//
//if($result_post == ""){
//    $post_insert="INSERT INTO post_likes_counter (n_likes, post_id) VALUES('','')";
//}
//else{
//    $post_updater="UPDATE post_likes_counter SET n_likes='$nome', post_id='$apelido' WHERE post_id='$id'";
//}
//
//
//
//
//
//
//
//$query = "INSERT INTO post_likes (id_post,user_id) VALUES ('$id_post','$id')";
//mysqli_query($lig, $query);
//
//echo $query;
