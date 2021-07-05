<?php

session_start();
include("../functions/init.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Social Together</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Meera+Inimai" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="index.css" rel="stylesheet">
</head>
<?php
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
}
?>
<body class="bg-light">

<nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color:#109935;">
    <a class="navbar-brand mr-auto mr-lg-0" href="#">Olá, <?php echo $_SESSION['nome']; ?></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <form class="form-inline my-2 my-lg-0 pl-3">
                <input class="form-control mr-sm-2" type="text" placeholder="Procurar" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </ul>
        <div class="nome" style="color:white;">
            Social Together
        </div>
    </div>
</nav>
<?php
abre_base_dados($lig);
$query_util = devolve_query($lig, "posts_historico A", "A.*", "1 ORDER BY post_id DESC");
?>
<div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
        <a class="nav-link active" href="#">Página Inicial</a>
        <a class="nav-link" href="#">
            Amigos
            <span class="badge badge-pill bg-light align-text-bottom">27</span>
        </a>
        <a class="nav-link" href="todas_publicacoes.php">Publicações</a>
        <a class="nav-link" href="#">Teste</a>
        <a class="nav-link" href="#">Teste</a>
        <a class="nav-link" href="#">Teste</a>
        <a class="nav-link" href="#">Teste</a>
    </nav>
</div>

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50  rounded box-shadow">
        <div class="col-12">
            <form id="edit-form" method="post" role="form" action="criar_post_pubs.php">
                <div class="c-header">
                    <div class="c-h-inner">
                        <ul>
                            <li style="border-right:none;">
                                <i class="fa fa-pencil-square" style="color:#109935;"></i>
                                <a href="#">Publicação</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-body pb-4 pt-2">
                    <div class="body-left">
                        <div class="img-box">
                            <img src="../imagens/profile.jpg">
                        </div>
                    </div>
                    <div class="body-right">
                        <ul class="mr-auto">
                            <li>
                                <span id="nome" hidden><?php echo $_SESSION['nome'] ?>?</span>
                                <span id="user_id" hidden><?php echo $_SESSION['id'] ?></span>
                                <textarea style="margin-right:auto;" class="text-type" name="mensagem" id="mensagem"
                                          placeholder="Em que estás a pensar, <?php echo $_SESSION['nome'] ?>?"></textarea>
                                <input type="button" name="postagem-submit" id="postagem-submit"
                                       tabindex="4"
                                       class="btn btn2 btn-outline-success" style="margin-left:5%" value="Publicar">
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Publicações Recentes</h6>

        <?php
        $user_id = $_SESSION['id'];
        $query_util = mysqli_query($lig, "SELECT * FROM `posts_historico` LEFT JOIN `post_likes` ON `posts_historico`.`post_id`=`post_likes`.`id_post` ORDER BY `post_id` DESC");

        $resultado = mysqli_query($lig, "SELECT * FROM `posts_historico` LEFT JOIN `post_likes` ON `posts_historico`.`post_id`=`post_likes`.`id_post` WHERE `posts_historico`.`users_id` != $user_id ORDER BY `post_id` DESC LIMIT 3");
        if ($num_linhas = mysqli_num_rows($resultado) > 0) {
            while ($artigo = mysqli_fetch_object($resultado)): ?>
                <div class="row pubs" id="artigo-<?php echo $artigo->post_id ?>">
                    <div class="col col-12 py-1 my-3 text-white-50  rounded box-shadow"
                         style="box-shadow: 1px 1px 1px 1px #aaaaaa">
                        <div class="post_header">
                            <img style="border-radius: 5px;" src="../imagens/profile.jpg" height="50px">
                            <a style="color:#222d32;"><b><?php echo $artigo->nome ?></b></a>

                            <div class="btn-group dropup dropdown" style="float:right;">
                                <button type="button" class="btn dropdown-toggle settings" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                    <?php if ($artigo->users_id === $_SESSION['id']) { ?>
                                        <button class="dropdown-item apagar-submit"
                                                name="apagar-submit"
                                                id="apagar-submit"
                                                data-post="<?php echo $artigo->post_id ?>"><i class="fa fa-trash-o"
                                                                                              style="color:#109935;"></i>
                                            Apagar Publicação
                                        </button>
                                        <?php

                                    } else { ?>
                                        <a class="dropdown-item" href="#">teste1</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="post_body">
                            <br>
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"><?php echo $artigo->descricao ?></p>
                        </div>
                        <br>
                        <div class="post_footer">
                            <?php
                            //likes to each post
                            $likes_counter = mysqli_query($lig, "SELECT * FROM `posts_historico` LEFT JOIN `post_likes` ON `posts_historico`.`post_id`=`post_likes`.`id_post` WHERE `posts_historico`.`post_id`=`post_likes`.`id_post`");
                            $likes_counter = mysqli_affected_rows($lig);

                            ?>
                            <small style="color:#109935; font-size: 17px; padding-left: 1%;"><i class="fa fa-thumbs-up"><b> <?php echo $likes_counter; ?></b></i>
                            </small>
                            <br>
                            <?php if ($artigo->id_post == null): ?>
                                <button style="background-color: transparent;" class="btn btn-like my-3"
                                        data-article="<?php echo $artigo->post_id ?>">
                                    <i class="fa fa-thumbs-up mr-2"></i> Gosto
                                </button>
                            <?php else : ?>
                                <button class="btn btn-like btn-like-actived my-3"
                                        data-article="<?php echo $artigo->post_id ?>">
                                    <i class="fa fa-thumbs-down mr-2"></i> Não Gosto
                                </button>
                            <?php endif; ?>
                            <button class="btn btn-transparent" id="responder_pub" name="responder_pub">
                                Comentar
                            </button>
                            <div class="col col-12 my-3 text-white-50  rounded box-shadow" id="comentario_pub"
                                 style="display:none; color:black;box-shadow: 1px 1px 1px 1px #aaaaaa;">
                                <div class="comentario_pub_topo">
                                    Comentários
                                </div>
                                <div class="comentario_pub_comentar">
                                    <span id="nome" hidden><?php echo $_SESSION['nome'] ?>?</span>
                                    <span id="user_id" hidden><?php echo $_SESSION['id'] ?></span>
                                    <div class="row">
                                    <textarea rows="1" class="text-type" name="comentario"
                                              id="comentario"
                                              placeholder="Escrever"></textarea>
                                        <input type="button" class="comentario_enviar fa-input" name="comentario_enviar"
                                               id="comentario_enviar" tabindex="4" value="&#xf1d8;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php } else {
            ?>
            <h4 style="color:#109935;">Sem publicações recentes</h4>
            <?php
        }
        ?>
    </div>


    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
        <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                </div>
                <span class="d-block">@username</span>
            </div>
        </div>
        <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                </div>
                <span class="d-block">@username</span>
            </div>
        </div>
        <div class="media text-muted pt-3">
            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                </div>
                <span class="d-block">@username</span>
            </div>
        </div>
        <small class="d-block text-right mt-3">
            <a href="#">All suggestions</a>
        </small>
    </div>
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<script src="dist/js/jquery-3.3.1.min.js"></script>
<script src="dist/js/popper.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script type="text/JavaScript">

    $(document).ready(function () {
        $('#responder_pub').click(function () {
            var x = document.getElementById("comentario_pub");
            var comentario = document.getElementById("comentario");
            if (x.style.display === "none") {
                x.style.display = "block";
                comentario.focus();
            } else {
                x.style.display = "none";
            }
        });

        $('#comentario_enviar').click(function () {
            var comentario = $("#comentario").val();
            var nome = $("#nome").val();
            var user_id = $("#user_id").val();

            if(document.getElementById("comentario").value.trim() == ''){
            }
            else{
                $.post("enviar_comentarios_pubs.php", {
                      nome: nome,
                      user_id: user_id,
                      comentario: comentario
                  }).done(function () {
                      console.log("Success");
                  });
                document.getElementById("comentario").value = '';
            }
        });
        $('#postagem-submit').click(function () {

            var nome = $("#nome").val();
            var mensagem = $("#mensagem").val();
            var user_id = $("#user_id").val();
            $.post("criar_post_pubs.php", {
                nome: nome,
                mensagem: mensagem,
                user_id: user_id
            }).done(function () {
                console.log("Success");
            });
        });
    });
</script>
<script>
    let $document = $(document);
    $document.on('click', '.apagar-submit', function () {
        var post_id = $(this).data('post'); //Vai buscar o valor do data-post
        // //envia o ajax para o PHP
        $.ajax({
            type: 'POST',
            url: './apagar_pub.php',
            data: {
                post_id: post_id
            },
            success: function (message) {
                console.log(message);
                $('#artigo-' + post_id).remove();
                $('.pubs').load('update_pubs_INDEX.php').fadeIn("Slow");
            },
            error: function (a, b, c) {
                console.error(a);
                console.error(b);
                console.error(c);
            }
        })
    })
</script>
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

</body>
</html>
