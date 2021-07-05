<?php include "functions/header2.php" ?>
<?php include "functions/navbar.php"; ?>
<link href="css/registro.css" rel="stylesheet">

<?php include "functions/functions.php"; ?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">

    </div>


</div>
<div class="row registro_esquerda">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="register-form" method="post" role="form" action="insert_bd.php">

                            <div class="form-group">
                                <input type="text" name="nome" id="nome" tabindex="1" class="form-control"
                                       placeholder="First Name" value="" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="apelido" id="apelido" tabindex="1" class="form-control"
                                       placeholder="Last Name" value="" required>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="register_email" tabindex="1" class="form-control"
                                       placeholder="Email Address" value="" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control"
                                       placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4"
                                               class="form-control btn btn-register" value="Register Now">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "functions/footer.php"; ?>
