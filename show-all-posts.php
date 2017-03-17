<?php

use Service\Post\PostService;

require_once 'app.php';


$postsService = new PostService($db);

/** @var $posts \Data\Posts\AllPostsViewData */
$posts = $postsService->findAll();

/*foreach ($posts->getPosts() as $p){
    echo $p->getAuthorId() . '<br>';
}*/

include_once 'showAll.html';
include_once 'showAll.html';