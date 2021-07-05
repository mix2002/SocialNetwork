<?php
session_start();
include("../functions/funcoes_bd.php");
abre_base_dados($lig);

if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
}

$id = $_SESSION['id'];

//Para podermos apagar o artigo temos que apagar todos os likes e comentários feitos
$query = mysqli_prepare($lig, "DELETE FROM `post_likes` WHERE `id_post` = ?");
$query->bind_param("i", $_POST['post_id']);
$query->execute();

$query = mysqli_prepare($lig, "DELETE FROM `posts_historico` WHERE `post_id` = ?");
$query->bind_param("i", $_POST['post_id']);
$query->execute();

if($error = mysqli_error($lig)){
    echo json_encode($error);
}else{
    echo json_encode([
       'status'  => 'success',
        'message' => 'O artigo foi apagado com sucesso'
    ]);
}






return json_encode(mysqli_error($lig));


/*
    //receber os dados do formulario
    $id = $_SESSION['id'];
    $select = "SELECT * FROM posts_historico";
    $resultado = $lig->query($select);
    while ($row = $resultado->fetch_assoc()) {
        $post_ID = $row['post_id'];
        $user_id = $row['users_id'];
        if ($id === $user_id) {
            $query = "DELETE FROM `posts_historico` WHERE post_id='$post_ID' AND users_id='$id'";
            mysqli_query($lig, $query);
            echo $user_id;
            echo $post_ID;
            echo "Apagado com sucesso";
        }
*/

//header("Location: index.php");