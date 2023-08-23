<?php
function authGetUser(): ?array{
    $user = null;
    $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
    if($token !== null){
        $session = sessionsOne($token);
        
        if($session !== null){
            $user = userOneById($session['id_user']);   
        }

        if($user === null){
            unset($_SESSION['token']);
            setcookie('token', $token, time() - 3600 * 24 , BASE_URL);
        }   
    }

    return $user;
}

function redirectIfNoReg(?array $user): void{
    if($user === null){
        header('Location: ' . BASE_URL . 'auth/login');
        exit();
    }
    
}