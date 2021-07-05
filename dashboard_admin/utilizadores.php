
<?php include "functions/header.php" ?>
<?php
if(!isset($_SESSION['admin'])==1)
{
    header("Location: ../index.php");
}
?>
<!-- adicionar os css customizados -->
<link href="css/utilizadores.css" rel="stylesheet">
<link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<!-- /adicionar os css customizados/ -->

<body class="hold-transition skin-blue sidebar-mini">
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
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
                                            Administrador
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
                        <p><?php echo $_SESSION['nome'] ?> (<?php if (isset($_SESSION['admin']) == 1) {?>Administrador)
                            <?php } else {?>Membro)<?php
                            }
                            ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Painel de Controlo</li>
                    <!-- Optionally, you can add icons to the links -->

                    <li><a href="index.php"><i class="fa fa-home"></i> <span>Página Inicial</span></a></li>
                    <li class="active"><a href="utilizadores.php"><i class="fa fa-user"></i> <span>Utilizadores</span></a></li>
                    <li><a href="estatisticas.php"><i class="fa fa-line-chart"></i> <span>Estatisticas</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-wrench"></i> <span>Suporte</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="tickets.php"><i class="fa fa-ticket"></i> Ajuda</a></li>
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
    $query_util=devolve_query($lig,"utilizadores A","A.*");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Utilizadores
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Página Inicial</a></li>
                <li class="active"><a href="#"><i class="fa fa-users"></i> Utilizadores</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!-- Texto dos divs -->
            <div class="table-responsive col-10 table_top">
                <table id="table" class="table table-striped table-bordered">
                    <thead class="table_head">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Email</th>
                        <th>Admin</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($linha = $query_util->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo $linha['id']; ?>
                            </td>
                            <td>
                                <?php echo htmlentities($linha['nome'],ENT_QUOTES,"ISO-8859-1"); ?>
                            </td>
                            <td>
                                <?php echo htmlentities($linha['apelido'],ENT_QUOTES,"ISO-8859-1"); ?>
                            </td>
                            <td>
                                <?php echo htmlentities($linha['email'],ENT_QUOTES,"ISO-8859-1"); ?>
                            </td>
                            <td>
                                <?php
                                if($linha['admin']==1){
                                    ?>
                                    <input type="checkbox" checked="checked" disabled>
                                    <?php
                                }else{
                                    ?>
                                    <input type="checkbox" disabled>
                                    <?php
                                }?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>

            <!-- /Texto dos divs -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "functions/footer.php"; ?>
    <script>
        $(document).ready(function(){
            $('#table').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Sem registros",
                    "info": "A mostrar página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sem registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totais)",
                    "search": "Procurar:",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próxima"
                    }
                }
            });
        });
    </script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

</body>
