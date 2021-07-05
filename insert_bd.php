<?php
include "functions/funcoes_bd.php";
abre_base_dados($lig);
if (isset($_POST['register-submit'])) {

    function encstamp($stamp)
    {
        $plaintext = $stamp;
        $passwrd = '3sc3RLrpd17';
        $method = 'aes-256-cbc';
        // Must be exact 32 chars (256 bit)
        $passwrd = substr(hash('sha256', $passwrd, true), 0, 64);

// IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
        $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $passwrd, OPENSSL_RAW_DATA, $iv));
        return $encrypted;
    }


    //receber os dados do formulario
    $nome = mysqli_real_escape_string($lig, $_POST['nome']);
    $apelido = mysqli_real_escape_string($lig, $_POST['apelido']);
    $email = mysqli_real_escape_string($lig, $_POST['email']);
    $password = mysqli_real_escape_string($lig, $_POST['password']);
    $plaintext = $password;
    $stamp = rand(10, 1000);
    $passwrd = '3sc3RLrpd17';
    $passwrd = $passwrd . $stamp;
    $method = 'aes-256-cbc';


    // Must be exact 32 chars (256 bit)
    $passwrd = substr(hash('sha256', $passwrd, true), 0, 64);
    // IV must be exact 16 chars (128 bit)
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
    $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $passwrd, OPENSSL_RAW_DATA, $iv));

    $stamp = encstamp($stamp);

    if (empty($nome)) {
        array_push($errors, "Nome é obrigatório");
    }
    if (empty($apelido)) {
        array_push($errors, "Apelido é obrigatório");
    }
    if (empty($email)) {
        array_push($errors, "Email é obrigatório");
    }
    if (empty($password)) {
        array_push($errors, "Password é obrigatória");
    }
    $user_check_query = "SELECT * FROM utilizadores WHERE email='$email' LIMIT 1";
    $result = mysqli_query($lig, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    alerta("teste2");
    if ($email) {//já existe
        if ($email['email'] === $email) {
            array_push($errors, "Email já registrado");
        }
        alerta("teste3");
    }


    if (count($errors) == 0) {

        $query = "INSERT INTO utilizadores (nome,apelido,email,password,stamp) VALUES ('$nome','$apelido','$email','$encrypted','$stamp')";
        mysqli_query($lig, $query);

        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Estás logado";
        alerta("teste1");
        header('location: index.php');
    }
}
