<?php
use Service\User\UserService;

require_once 'app.php';

unset($_SESSION['errorMessage']);

$userService = new UserService($db, $encryptionService);
if (isset($_POST['register']) && isset($_POST['rules']) && isset($_POST['g-recaptcha-response'])) {

    $captcha = $_POST['g-recaptcha-response'];

    if(!$captcha){
        header("Location: register.php");
        exit;
    }

    try{
        $userService->register(
            htmlentities($_POST['firstName']),
            htmlentities($_POST['lastName']),
            htmlentities($_POST['username']),
            htmlentities($_POST['email']),
            htmlentities($_POST['password']),
            htmlentities($_POST['confirmPassword']),
            new DateTime(htmlentities($_POST['birthday'])),
            htmlentities($_POST['gender']),
            htmlentities($_POST['phoneNumber'])
        );
        header("Location: login.php");
        exit;
    } catch (Exception $e){
        $_SESSION['errorMessage'] = $e->getMessage();
    }

}

include_once 'register.html';

