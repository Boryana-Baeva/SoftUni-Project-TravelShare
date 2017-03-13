<?php

require_once 'app.php';

$app->checkLogin();

date_default_timezone_set('Europe/Sofia');

if(isset($_POST['publishRide'])){
    $userId = $_SESSION['user_id'];
    $datePublished = new DateTime('now');
    $townFrom = $_POST['from'];
    $townTo = $_POST['destination'];
    $date = new DateTime($_POST['date']);
    $hour = new DateTime($_POST['hour']);
    $departureTime = new DateTime();
    $departureTime->setDate($date->format('Y'), $date->format('m'), $date->format('d'));
    $departureTime->setTime($hour->format('H'), $date->format('i'), $date->format('s'));
    $seats = $_POST['seats'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $postService = new \Service\Post\PostService($db);

    $postService->publish(
        $userId,
        $datePublished,
        $townFrom,
        $townTo,
        $seats,
        $departureTime,
        $price,
        htmlentities($description)
    );

    header("Location: profile.php");
    exit;
}
