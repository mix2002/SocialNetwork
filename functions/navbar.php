<link rel="stylesheet" type="text/css" href="navbar.css">
<div id="top"></div>
<!--Navbar-->
<div id=home" class="home2 ">

<nav class="navbar navbar-expand-lg navbar-trans">
    <a class="navbar-brand white-text" href="#">Social Together</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link white-text" href="index.php">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link white-text" href="sobre.php">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link white-text" href="#contactos">Contactos</a>
            </li>
        </ul>

        <?php
           if(!isset($_SESSION['id']))
           {
        ?>
        <ul>
            <button type="button" class=" mr-4 btn btn-default btn-md btn-rounded" id="entrar">Entrar</button>
        </ul>
    </div>
    <?php
           }
           else{
    ?>
               <div class="btn-group dropleft">
                   <button class="btn mr-4 btn-elegant btn-rounded dropdown-toggle " type="button" id="dropdownMenuButton"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Olá, <?php echo $_SESSION['nome'] ?>
                   </button>
                   <div class="dropdown-menu">
                       <h6 class="dropdown-header indigo-text">Social Together</h6>
                       <?php if (!$_SESSION['admin']) {?> <a class="dropdown-item drop_login" href="dashboard_user/index.php">Painel de Controlo</a> <?php }?>
                       <?php if ($_SESSION['admin']) { ?><a class="dropdown-item drop_login" href="dashboard_admin/index.php">Administração</a> <?php } ?>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item drop_login" href="logout.php">Sair</a>
                   </div>
               </div>
               <?php
           }
    ?>
</nav>
<!--/.Navbar-->