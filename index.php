<?php include "functions/header2.php" ?>
<?php include "functions/navbar.php" ?>

    <!--Mask-->

    <div class="container-fluid full-bg-img d-flex align-items-center justify-content-center"
    <div class="flex-center col-md-10 text-center">
        <ul class="animated fadeInUp align-items">
            <li>
                <h1 class="display-3 mb-4 font-bold text-white">Social Together</h1></li>
            <li>
                <h3 class="mb-4 text-white">A tua rede social preferida!</h3>
            </li>
            <li>
                <?php if (isset($_SESSION['email'])) { ?><?php } ?>
                <?php if (!isset($_SESSION['email'])) { ?><a href="registro.php" class="btn btn-dark btn-lg z-depth-2"
                                                             id="registro" rel="nofollow">Registra-te!</a> <?php } ?>

                <a href="sobre.php"
                   class="btn btn-outline-white btn-lg z-depth-2 " rel="nofollow">Sabe Mais</a>
            </li>
        </ul>
    </div>
    <!--/.Mask-->
    </div>
<?php
include_once "form_login.php";
?>

<?php include "functions/footer.php"; ?>