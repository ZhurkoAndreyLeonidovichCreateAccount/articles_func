<?php

function sessionsAdd(int $idUser, string $token){
    
    $sql = "INSERT INTO sessions (id_user, token) VALUES(:uid, :token)";
    dbQuery($sql, ['uid' => $idUser, 'token' => $token]);
    return true;
}

function sessionsOne(string $token): ?array{
    $sql = "SELECT * FROM sessions WHERE token = :token";
    $session = dbQuery($sql,['token'=>$token])->fetch();
    return $session === false ? null  : $session;
}
