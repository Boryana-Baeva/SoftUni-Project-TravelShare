<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.3.2017 г.
 * Time: 23:18 ч.
 */

namespace Service\Post;


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
}