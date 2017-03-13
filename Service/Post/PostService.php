<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.3.2017 г.
 * Time: 23:21 ч.
 */

namespace Service\Post;

use Adapter\DatabaseInterface;

class PostService implements PostServiceInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;

    }

    public function publish($userId,
                            \DateTime $datePublished,
                            $townFrom,
                            $townTo,
                            $seats,
                            \DateTime $departureTime,
                            $price,
                            $description)
    {
        $query = "INSERT INTO posts (
                       user_id,
                       date_published,
                       town_id_from,
                       town_id_to,
                       seats,
                       departure_time,
                       price,
                       description  
                    ) VALUES (
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?
                    );";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
            [
                $userId,
                $datePublished->format('Y-m-d H:i:s'),
                $townFrom,
                $townTo,
                $seats,
                $departureTime->format('Y-m-d H:i:s'),
                $price,
                $description
            ]
        );

    }
}