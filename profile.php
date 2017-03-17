<?php

use Service\User\UserService;

require_once 'app.php';

$app->checkLogin();

$userService = new UserService($db, $encryptionService);

$id = $_GET['id'];
$user = $userService->findById($id);

include_once 'profile.html';