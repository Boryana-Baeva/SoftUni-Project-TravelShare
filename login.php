<?php

require_once 'app.php';


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userService = new \Service\User\UserService($db, $encryptionService);

    $user = $userService->login($email, $password);

    $_SESSION['user_id'] = $user->getId();
    $_SESSION['username'] = $user->getUsername();
    $_SESSION['email'] = $user->getEmail();


    header("Location: index.php");
    exit;
}


include_once 'login.html';