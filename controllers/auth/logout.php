<?php
    unset($_SESSION['token']);
    setcookie('token', '', time() - 3600 * 24 , BASE_URL);
    header('Location:' . BASE_URL);
    exit();