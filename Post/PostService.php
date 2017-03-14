<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.3.2017 г.
 * Time: 23:21 ч.
 */

namespace Service\Post;

use Adapter\DatabaseInterface;
use Data\Posts\AllPostsViewData;
use Data\Posts\Post;
use Data\Posts\PostsViewData;

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


    private function find($where = null, $params = [])
    {
        $query = "
                  SELECT 
                    users.username AS author,
                   DATE(posts.date_published) AS datePublished,
                   t1.town_name AS townFrom,
                   t2.town_name AS townTo,
                   posts.departure_time AS departureTime,
                   posts.price,
                   posts.seats
                FROM
                   posts
                INNER JOIN
                   users
                ON
                   posts.user_id = users.id
                INNER JOIN
                   towns t1
                ON
                   posts.town_id_from = t1.id
                INNER JOIN
                   towns t2
                ON   
                   posts.town_id_to = t2.id";
        if ($where) {
            $query .= $where;
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);



        $allPosts = new AllPostsViewData();

        $lazyLoadedAllPosts = function() use($stmt)
        {
            /** @var PostsViewData $post */
            while ($post = $stmt->fetchObject(PostsViewData::class)) {

                yield $post;
            }
        };
        $allPosts->setPosts($lazyLoadedAllPosts);

        return $allPosts;
    }

    public function findAll(): AllPostsViewData
    {
        return $this->find();
    }

    public function findSearched($townFrom,
                                 $townTo,
                                 \DateTime $departureTime,
                                 $seats): AllPostsViewData
    {

        $params = [];
        $where = " WHERE t1.id = ? AND t2.id = ? AND departure_time LIKE CONCAT('%', ?, '%') AND posts.seats = ?";
        $params[] = $townFrom;
        $params[] = $townTo;
        $params[] = $departureTime->format('Y-m-d');
        $params[] = $seats;

        return $this->find($where, $params);
    }

    public function findById($id): Post
    {
        $query =
            "SELECT
                users.username AS author,
                posts.date_published AS datePublished,
                t1.town_name AS townFrom,
                t2.town_name AS townTo,
                posts.departure_time AS departureTime,
                posts.seats,
                posts.price,
                posts.description
            FROM 
                posts
            INNER JOIN 
                users
            ON 
                posts.user_id = users.id
            INNER JOIN
               towns t1
            ON
               posts.town_id_from = t1.id
            INNER JOIN
               towns t2
            ON   
               posts.town_id_to = t2.id
            WHERE
                posts.id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        /** @var Post $post */
        $post = $stmt->fetchObject(Post::class);

        return $post;
    }
}