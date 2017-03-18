<?php
use Service\User\UserService;

require_once 'app.php';

unset($_SESSION['errorMessage']);

$userService = new UserService($db, $encryptionService);
if (isset($_POST['register'])) {

    try{

        if(!isset($_POST['rules'])){
            throw new Exception("Моля потвърдете, че сте прочели и сте съгласни с правилата");
        }

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

