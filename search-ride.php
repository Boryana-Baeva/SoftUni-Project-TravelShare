<?php

use Service\Post\PostService;

require_once 'app.php';

if(isset($_POST['searchRide'])){
    $townFrom = intval($_POST['searchFrom']);
    $townTo = intval($_POST['searchDestination']);
    $departureDate = new DateTime($_POST['searchDate']);
    $seats = intval($_POST['searchSeats']);

    $postsService = new PostService($db);
    /** @var $searchResult \Data\Posts\AllPostsViewData */
    $searchResult = $postsService->findSearched($townFrom, $townTo, $departureDate, $seats);

}
include_once 'showFoundPosts.html';
