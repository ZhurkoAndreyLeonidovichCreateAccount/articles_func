<?php
$regErr = '';
$login = '';
$email = '';
$name = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login = trim($_POST['login']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    if($login === '' || $password1 === '' || $password2 === '' || $email === '' || $name === ''){
        $regErr = "Не все поля заполнены!";
    }
    elseif(mb_strlen($login, 'UTF8') < 2){
        $regErr = 'Логин должен быть более 2-х символов';
    }
    elseif ($password1 !== $password2) {
        $regErr =  "Пароли в обеих полях должны соответствовать!";
    }
    elseif (userOneByLogin($login) !== null ) {
        $regErr = "Пользователь с таким логином уже зарегистрирован!";
    }
    else {
        $existence = userOneByEmail($email);
        if(isset($existence)){
            $regErr = "Пользователь с такой почтой уже зарегистрирован!";
        }else{
            $pass = password_hash($password1, PASSWORD_DEFAULT);
            $post = [
                'login' => $login,
                'password' => $pass,
                'email' => $email,
                'name' => $name,
            ];
            addUser($post);
            $id_user = dbLastId();
            $token = substr(bin2hex(random_bytes(128)), 0, 128);
            sessionsAdd($id_user, $token);
            $_SESSION['token'] = $token;
            header('Location:' . BASE_URL);
            exit();
        }
    }

    
}

$pageTitle = 'registration';
$pageContent = template('auth/v_reg', ['regErr' =>  $regErr,
                                       'login' => $login,
                                       'email' => $email,
                                       'name' => $name

]);