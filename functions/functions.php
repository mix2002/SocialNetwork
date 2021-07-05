<?php

/******************** Helper functions *********************/
/*Start */
function clean($string){
    return htmlentities($string);
}

function redirect($location){
    return header("Location: {$location}");
}

function set_message($message){

    if(!empty($message)){
        $_SESSION['message']= $message;
    }else{
        $message ="";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];

        unset($_SESSION['message']);
    }
}

function token_generator(){

    $token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
    return $token;
}

function display_validation_errors($error_message){
    $error_message= <<<DELIMITER
                    <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> $error_message
                    </div>
DELIMITER;

    return $error_message ;
}


function email_exists($email){
    abre_base_dados($lig);
    $sql="SELECT  id FROM utilizadores WHERE email='$email'";

    $result = mysqli_query($lig,$sql);

    if(mysqli_num_rows($result) == 1){
        return true;
    }else{
        return false;
    }
}
function send_email($email, $subject,$msg,$headers){
    return mail($email, $subject,$msg,$headers);
}
/*End */


/******************** Validate users Login functions *********************/
/*Start */


function validar_user_login(){

    alerta("tecnimobile_ddviagens");
    $errors = [];
    $min =3;
    $max =20;

    if($_SERVER['REQUEST_METHOD']== "POST") {

        $email = clean($_POST['email']);
        $password = clean($_POST['password']);

        if(empty($email)){
            $errors[]="Email Field cannot be empty";
        }

        if(empty($password)){
            $errors[]="Password Field cannot be empty";
        }


        if(!empty($errors)) {
            foreach ($errors as $error) {
                echo display_validation_errors($error);
            }
        }else{
            if(login_utilizador($email,$password)){

                //admin
                redirect("./dashboard_user/home.php");
            }
            else{
                echo display_validation_errors("Your credentials are not correct!");
            }
        }
    }
}







/******************** User Login functions *********************/
/*Start */

function login_utilizador($email,$password)
{
    $sql="SELECT password,id FROM utilizadores WHERE email='".escape($email)."'AND ativo=1";
    $result=($sql);

    if(row_count($result) ==1){
        $row= fetch_array($result);
        $db_password= $row['password'];

        if(md5($password)=== $db_password){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}



?>