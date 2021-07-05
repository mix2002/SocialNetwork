<?php

session_start();

include "../functions/funcoes_bd.php";

abre_base_dados($lig);


$id = $_SESSION['id'];
$query_util = mysqli_query($lig, "SELECT * FROM `posts_historico` LEFT JOIN `post_likes` ON `posts_historico`.`post_id`=`post_likes`.`id_post` ORDER BY `post_id` DESC");

$resultado = mysqli_query($lig, "SELECT * FROM `posts_historico` LEFT JOIN `post_likes` ON `posts_historico`.`post_id`=`post_likes`.`id_post` WHERE `posts_historico`.`users_id` != $user_id ORDER BY `post_id` DESC");
if ($num_linhas = mysqli_num_rows($resultado) > 0) {
    while ($artigo = mysqli_fetch_object($resultado)): ?>

        <div class="col col-12 py-1 my-3 text-white-50  rounded box-shadow" style="box-shadow: 1px 1px 1px 1px #aaaaaa">
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
                                                                                  style="color:#109935;"></i> Apagar
                                Publicação
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
                <?php if ($artigo->id_post == null): ?>
                    <button style="background-color: transparent" class="btn btn-like my-3"
                            data-article="<?php echo $artigo->post_id ?>">
                        <i class="fa fa-thumbs-up mr-2"></i> Gosto
                    </button>
                <?php else : ?>
                    <button class="btn btn-like btn-like-actived my-3"
                            data-article="<?php echo $artigo->post_id ?>">
                        <i class="fa fa-thumbs-down mr-2"></i> Não Gosto
                    </button>
                <?php endif; ?>
                <button class="btn btn-transparent"
                        style="padding: 10px 16px; color:#109935; background: transparent; transition: all 0.4s ease;">
                    Responder
                </button>
            </div>
        </div>
    <?php endwhile; ?>
<?php } else {
    ?>
    <h4 style="color:#109935;">Sem publicações recentes</h4>
    <?php
}
?>