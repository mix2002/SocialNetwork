<?php

session_start();

if(isset($_POST['submit'])){
    include "functions/funcoes_bd.php";

    abre_base_dados($lig);


    function estamp($email)
    {
        abre_base_dados($lig);

        $sql="SELECT * FROM utilizadores WHERE email='$email'";
        $result = $lig->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $rtg= $row["stamp"];
            }
        } else {
            echo "0 results";
        }
        $lig->close();
        return $rtg;
    }
    function decstamp($stamp)
    {

        $password = '3sc3RLrpd17';
        $method = 'aes-256-cbc';

// Must be exact 32 chars (256 bit)
        $password = substr(hash('sha256', $password, true), 0, 64);


// IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
        $encrypted = $stamp;

        $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }






    $email= mysqli_real_escape_string($lig, $_POST['txtemail']);
    $password= mysqli_real_escape_string($lig, $_POST['txtpassword']);
    $stamp=estamp($email);
    $stamp=decstamp($stamp);
    $passwrd = '3sc3RLrpd17';
    $passwrd=$passwrd .$stamp;
    $method = 'aes-256-cbc';

// Must be exact 32 chars (256 bit)
    $passwrd = substr(hash('sha256', $passwrd, true), 0, 64);


// IV must be exact 16 chars (128 bit)
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
    $encrypted = base64_encode(openssl_encrypt($password, $method, $passwrd, OPENSSL_RAW_DATA, $iv));
//now use this $encypted to match password
     //Error handlers
    //Check if inputs are empty

    //here i check if inputs are empty
    if(empty($email) || empty($password)){
//se tiver vazio
        header("Location: index.php?login=empty");

    }else { //caso nao esteja vazio  if they are not empty, it will check the email so email function should be here instead of this one
        $sql = "SELECT * FROM utilizadores WHERE email='$email'";
        $result = mysqli_query($lig, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) { //if returns less than 1 gives error
            //se tiver erro
            header("Location: index.php?login=error1");
        } else { //se nao tiver erro, ou seja combina com os dados da db // if not it goes to the password verify
            if ($row = mysqli_fetch_assoc($result)) {
                //echo $row['user_uid'];
                //Descodificar password:
                if ($encrypted == $row['password']) {
                    $hashPwdCheck = true;
                } else {
                    $hashPwdCheck = false;
                }

                //verificar se é verdadeiro ou falso
                if ($hashPwdCheck == false) {
                    //falso, err

                    header("Location: index.php?login=error2");
                } elseif ($hashPwdCheck == true) {
                    //verdadeiro
                    //login the user


                    $email_check = $row['email'];
                    $sql2 = "UPDATE utilizadores SET online = 1 WHERE email='$email'";
                    mysqli_query($lig, $sql2);
                    if ($lig->query($sql2) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $lig->error;
                    }
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nome'] = $row['nome'];
                    $_SESSION['apelido'] = $row['apelido'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['admin'] = $row['admin'];
                    $_SESSION['online'] = $row['online']; //falta por a funfar o online mode brrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
                    echo "<br>";
                    echo $_SESSION['online'];
                    if ($_SESSION['admin']) {
                        header("Location: index.php?login=success");
                    } else {
                        header("Location: index.php?login=success2");

                    }
                }

            }
        }

    }
}else{
    header("Location: index.php?login=error3");
}