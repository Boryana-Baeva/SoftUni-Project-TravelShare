<?php
use Service\User\UserService;

require_once 'app.php';


$userService = new UserService($db, $encryptionService);
if (isset($_POST['register']) && isset($_POST['rules']) && isset($_POST['g-recaptcha-response'])) {

    $captcha = $_POST['g-recaptcha-response'];

    if(!$captcha){
        header("Location: register.php");
        exit;
    }

    $userService->register(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['confirmPassword'],
        new DateTime($_POST['birthday']),
        $_POST['gender'],
        $_POST['phoneNumber']
    );
    header("Location: login.php");
    exit;
}

include_once 'register.html';

