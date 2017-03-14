<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.3.2017 г.
 * Time: 23:10 ч.
 */

namespace Data\Posts;


class AllPostsViewData
{
    /**
     * @var \Generator|PostsViewData[]
     */
    private $posts;

    /**
     * @return PostsViewData[]|\Generator
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param callable
     */
    public function setPosts(callable $posts)
    {
        $this->posts = $posts();
    }
}