<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.3.2017 г.
 * Time: 01:43 ч.
 */

namespace Data\Posts;


class Post
{
    private $id;
    private $author;
    private $datePublished;
    private $townFrom;
    private $townTo;
    private $seats;
    private $departureTime;
    private $price;
    private $description;


    public function getAuthor()
    {
        return $this->author;
    }

    public function getDatePublished()
    {
        return $this->datePublished;
    }

    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function getTownFrom()
    {
        return $this->townFrom;
    }

    public function getTownTo()
    {
        return $this->townTo;
    }

}