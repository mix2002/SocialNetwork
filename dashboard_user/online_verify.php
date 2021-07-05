<?php

session_start();

include "functions/funcoes_bd.php";

abre_base_dados($lig);


$id = $_SESSION['id'];
$query_util = mysqli_query($lig, "SELECT * FROM utilizadores WHERE admin=0 AND id!=$id ORDER BY nome ASC");

while ($linha_util = $query_util->fetch_assoc()) {

    if ($linha_util['online'] == 1) {
        ?>
        <i class="fa fa-circle" style="font-size:.70em; color:green;"></i>
        <?php
    } else {
        ?>
        <i class="fa fa-circle" style="font-size:.70em; color:grey;"></i>
        <?php
    }

}
