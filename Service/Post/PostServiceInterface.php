<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.3.2017 г.
 * Time: 23:18 ч.
 */

namespace Service\Post;


use Data\Posts\AllPostsViewData;
use Data\Posts\Post;

interface PostServiceInterface
{
    public function publish($userId,
                            \DateTime $datePublished,
                            $townFrom,
                            $townTo,
                            $seats,
                            \DateTime $departureTime,
                            $price,
                            $description);

    public function findAll(): AllPostsViewData;

    public function findSearched($townFrom,
                                 $townTo,
                                 \DateTime $departureTime,
                                 $seats): AllPostsViewData;

    public function findById($id): Post;
    
    public function findRecent(): AllPostsViewData;
}