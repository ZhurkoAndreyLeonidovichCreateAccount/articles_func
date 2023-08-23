<?php
function userOneByLogin(string $login): ?array{
    $sql = "SELECT id_user, password FROM users WHERE login = :login";
    $query = dbQuery($sql, ['login' => $login]);
    $user = $query->fetch();
    return $user === false ? null : $user;
}

function userOneById(string $id): ?array{
    $sql = "SELECT id_user, login, email, name  FROM users WHERE id_user = :id";
    $query = dbQuery($sql, ['id' => $id]);
    $user = $query->fetch();
    return $user === false ? null : $user;
}

function userOneByEmail(string $email): ?array{
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = dbQuery($sql, ['email' => $email]);
    $user = $query->fetch();
    return $user === false ? null : $user;
}

function addUser(array $user): bool{
    echo '<pre> ';
    print_r($user);
    echo '</pre>';
    $sql = "INSERT INTO users ( `login`, `password`, `email`, `name`) VALUES (:login, :password, :email, :name)";
    //$sql = "INSERT INTO `users`(`login`, `password`, `email`, `name`) VALUES ('admin1','123','1@mail','andrei')";
    dbQuery($sql, $user);
    return true;
   
}