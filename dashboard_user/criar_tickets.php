<?php include "functions/header.php" ?>

<?php
if(!isset($_SESSION['id']))
{
    header("Location: ../index.php");
}
?>
<!-- adicionar os css customizados -->
<link href="css/index.css" rel="stylesheet">

<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- /adicionar os css customizados/ -->

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

    <!--Navbar -->
    <?php if ($_SESSION['admin'] == 0) { ?>
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

                    <li><a href="index.php"><i class="fa fa-home"></i> <span>Página Inicial</span></a></li>
                    <li><a href="utilizadores.php"><i class="fa fa-user"></i> <span>Utilizadores</span></a></li>
                    <li><a href="estatisticas.php"><i class="fa fa-line-chart"></i> <span>Estatisticas</span></a></li>
                    <li class="treeview active">
                        <a href="#"><i class="fa fa-wrench"></i> <span>Suporte</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="criar_tickets.php"><i class="fa fa-ticket"></i> Ajuda</a></li>
                            <li><a href="meustickets.php"><i class="fa fa-ticket"></i> Meus Tickets</a>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>


    <?php } ?>

    <!-- FIM NAVBAR -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ajuda
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-wrench"></i> Suporte</a></li>
                <li class="active"><a href="#"><i class="fa fa-ticket"></i> Ajuda</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <form id="edit-form" method="post" role="form" action="insert_bd_ticket.php">
                <div class="row">
                    <div class="form-group col-xs-4">
                        <h4>Assunto:</h4>
                        <input type="text" name="assunto" id="assunto" tabindex="1" class="form-control"
                               placeholder="Assunto" value="" required>
                    </div>
                    <div class="form-group col-xs-4">
                        <h4>Prioridade:</h4>
                        <select class="form-control col-xs-4" name="prioridade" id="prioridade" required>
                            <option>Alta</option>
                            <option>Média</option>
                            <option>Baixa</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-9">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Mensagem:
                                    <p>
                                        <small>"Descrição do problema/dúvida"</small>
                                    </p>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <!-- <form> -->
                                    <textarea class="textarea" name="mensagem" id="mensagem" placeholder="Escrever aqui"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                              required></textarea>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2">
                        <input type="submit" name="ticket-submit" id="ticket-submit" tabindex="4"
                               class="form-control btn btn-primary" value="Enviar">
                    </div>
                </div>
    </div>
    </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "functions/footer.php"; ?>
<!-- Bootstrap WYSIHTML5 -->
<script src="bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</body>
</html>
<?php if (isset($_SESSION['admin']) != 1) {
    header("Location: ../index.php");
}
?>
