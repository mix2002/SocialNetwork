<!-- the form to be viewed as dialog-->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="login.php" method="post">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-bold">Entrar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="email" name="txtemail" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" name="txtpassword" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Palavra-Passe</label>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-default btn-md">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</div>