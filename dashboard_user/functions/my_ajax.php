<?php

$link = new mysqli('localhost', 'tecnimobile_ddviagens', '1111', 'pap');
$link->query("SET NAMES utf8");
if ($link->connect_error) {
    $res = 'no';
}
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$prioridade = $_POST['prioridade'];
$admin = $_POST['admin'];
$resposta = $_POST['reply'];


$tickets_id = $_POST['id'];

$id = $_POST['id'];

$sql = "SELECT * FROM `tickets` 
			WHERE `id` = '" . $id . "'";

$result = $link->query($sql);
if ($result->num_rows > 0) $res = 'ok';
else $res = 'no';
if ($res == 'ok') {
    $row = $result->fetch_assoc();
    $users_id = $row['users_id'];

    if ($res == 'ok')

        $sql = "INSERT INTO `users_tickets` 
				SET `users_id` = '" . $users_id . "' , 
                        `assunto` = '" . $assunto . "', 
                        `mensagem` = '" . $mensagem . "', 
                        `prioridade` = '" . $prioridade . "', 
                        `resposta` = '" .$resposta . "',  
                        `admin` = '" . $admin . "', 
                        `lido` = 0 ,
					    `tickets_id` = '" . $tickets_id . "'";


    else {

    }

    if ($link->query($sql) === TRUE) $res = 'ok';
    else $res = 'no';

}

echo json_encode(array("res" => $res));
$link->set_charset("latin1");
exit;

?>