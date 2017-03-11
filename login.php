<?php

require_once 'app.php';


if (isset($_POST['login'])) {
    $userService = new \Service\User\UserService($db, $encryptionService);
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$userService->login($email, $password)) {
        throw new \Exceptions\LoginException("Password mismatch!");
    }

    header("Location: profile.php");
    exit;
}


include_once 'login.html';