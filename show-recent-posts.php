<?php

use Service\Post\PostService;

require_once 'app.php';


$postsService = new PostService($db);

/** @var $posts \Data\Posts\AllPostsViewData */
$recentPosts = $postsService->findRecent();
