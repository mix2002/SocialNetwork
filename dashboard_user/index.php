<?php

session_start();
include("functions/init.php");
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Social Together - Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->

    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <script type="text/javascript">
        var autoLoad = setInterval(
            function () {
                $('#teste_online').load('online_verify.php').fadeIn("Slow");

            }, 1000);
    </script>


</head>
<?php
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
}
?>
<!-- adicionar os css customizados -->
<link href="css/index.css" rel="stylesheet">
<!-- /adicionar os css customizados/ -->

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

    <!--Navbar -->
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>T</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Social</b>Together</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="dist/img/avatar.png" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo $_SESSION['nome'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="dist/img/avatar.png" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['nome'] ?>
                                    <small>
                                        Membro
                                    </small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <!-- <a href="#">Followers</a> -->
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <!--<a href="#">Sales</a>-->
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <!--<a href="#">Friends</a>-->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="perfil_editar.php" class="btn btn-default btn-flat">Editar Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION['nome'] ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Painel de Controlo</li>
                <!-- Optionally, you can add icons to the links -->

                <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Página Inicial</span></a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-wrench"></i> <span>Suporte</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="criar_tickets.php"><i class="fa fa-ticket"></i> Ajuda</a></li>
                        <li class="active"><a href="meustickets.php"><i class="fa fa-ticket"></i> Meus Tickets</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>


    <!-- FIM NAVBAR -->
    <?php
    abre_base_dados($lig);
    $query_util = devolve_query($lig, "posts_historico A", "A.*", "1 ORDER BY post_id DESC");
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="post_new">
                        <form id="edit-form" method="post" role="form" action="criar_post.php">

                            <div class="c-header">
                                <div class="c-h-inner">
                                    <ul>
                                        <li style="border-right:none;">
                                            <i class="fa fa-pencil-square"></i>
                                            <a href="#">Publicação</a>
                                        </li>
                                        <li>
                                            <input type="file" onchange="readURL(this);" style="display: none;"
                                                   name="post_image" id="uploadFile">
                                        </li>
                                        <li>
                                            <img src="imagens/icon1.png">
                                            <a href="#" id="uploadTrigger" name="post_image">Álbum de Fotos/Vídeos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="c-body">
                                <div class="body-left">
                                    <div class="img-box">
                                        <img src="imagens/profile.jpg">
                                    </div>
                                </div>
                                <div class="body-right">
                            <textarea class="text-type" name="mensagem"
                                      placeholder="Em que estás a pensar, <?php echo $_SESSION['nome'] ?>?"></textarea>
                                </div>
                            </div>
                            <div class="c-footer">
                                <div class="right-box">
                                    <ul>
                                        <li>
                                            <input type="submit" name="postagem-submit" id="postagem-submit"
                                                   tabindex="4"
                                                   class="form-control btn btn2" value="Enviar">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>


                    <?php


                    $resultado = mysqli_query($lig, "SELECT * FROM `posts_historico` LEFT JOIN `post_likes` ON `posts_historico`.`post_id`=`post_likes`.`id_post` ORDER BY `post_id` DESC");
                    if ($num_linhas = mysqli_num_rows($resultado) > 0):
                        while ($artigo = mysqli_fetch_object($resultado)): ?>
                            <br>
                            <div class="post">
                                <div class="post_header">
                                    <img style="border-radius: 5px;" src="imagens/profile.jpg" height="50px">
                                    <a style="color:#222d32;"><?php echo $artigo->nome ?></a>
                                </div>
                                <div class="post_body">
                                    <br>
                                    <p><?php echo $artigo->descricao ?></p>
                                </div>
                                <div class="post_footer">
                                    <?php if ($artigo->id_post == null): ?>
                                        <button class="btn btn-transparent btn-like my-3"
                                                data-article="<?php echo $artigo->post_id ?>">
                                            <i class="fa fa-thumbs-up mr-2"></i> Gosto
                                        </button>
                                    <?php else : ?>
                                        <button class="btn btn-transparent btn-like btn-like-actived my-3"
                                                data-article="<?php echo $artigo->post_id ?>">
                                            <i class="fa fa-thumbs-down mr-2"></i> Não Gosto
                                        </button>
                                    <?php endif; ?>
                                    <button class="btn btn-transparent"
                                            style="padding: 10px 16px; color:#f39c12; background: transparent; transition: all 0.4s ease;">
                                        Responder
                                    </button>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>


                <!-- Grupos -->
                <div class="col-md-3">
                    <div class="grupos">
                        <div class="grupos_header"><h4 style="padding-top:2%; padding-left:2%; color:grey">Grupos</h4>
                        </div>
                        <div class="grupos_body">....</div>
                        <div class="grupos_footer">......
                        </div>
                    </div>
                </div>


                <div class="chat-sidebar col-md-3" style="padding-top:4%">
                    <div class="sidebar_top" style="padding-bottom:5%">
                        Contactos
                    </div>
                    <?php
                    $id = $_SESSION['id'];
                    $query_util = mysqli_query($lig, "SELECT * FROM utilizadores WHERE admin=0 AND id!=$id ORDER BY nome ASC");
                    //$query_util = devolve_query($lig, "utilizadores A", "A.*", "1 ORDER BY A.nome ASC");


                    while ($linha_util = $query_util->fetch_assoc()) {

                        ?>
                        <div class="sidebar-name">
                            <!-- Pass username and display name to register popup -->

                            <!-- FALTA VERIFICAR O NOME PERTENCER AO ID -->
                            <div id="sidebar-user-box" class="100">
                                <table style="width:100%;">
                                    <tbody>
                                    <tr>
                                        <td><img width="30" height="30"
                                                 src="imagens/profile.jpg"/>
                                            <span><?php echo $linha_util['nome']; ?></span></td>
                                        <td align="right"
                                            style="padding-bottom: 7px;">
                                                <span class="teste_online" id="teste_online">
<textarea class="msg_input" rows="4" id="msg_input" placeholder="escreve aqui a mensagem">dsd</textarea>
                                                </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>



    </div>

    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "functions/footer.php"; ?>

<script type="text/javascript">
    $(document).ready(function () {
        var $document = $(document);
        $document.on('click', '.btn-like', function () {
            let article = $(this).data('article');
            let $element = $(this);
            if ($(this).hasClass('btn-like-actived')) {
                $.ajax({
                    type: 'POST',
                    url: './enviar_gosto.php',
                    data: {
                        article: article
                    },
                    success: function (message) {
                        $element.stop().removeClass('btn-like-actived').html('<i class="fa fa-thumbs-up mr-2"></i> Gosto');
                    },
                    error: function (a, b, c) {
                        console.error(a);
                        console.error(b);
                        console.error(c);
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: './enviar_gosto.php',
                    data: {
                        article: article
                    },
                    success: function (message) {
                        $element.stop().addClass('btn-like-actived').html('<i class="fa fa-thumbs-down mr-2"></i> Não Gosto');
                    },
                    error: function (a, b, c) {
                        console.error(a);
                        console.error(b);
                        console.error(c);
                    }
                });
            }
        });
    });
</script>
<script src="chat_test.js"></script>
</body>

