<?php

include_once 'show-recent-posts.php';
/** @var $recentPosts \Data\Posts\AllPostsViewData */

include_once 'load-towns.php';

if(isset($_SESSION['user_id'])){
    include_once 'index.html';
}else{
    include_once 'index-logged.html';
}
