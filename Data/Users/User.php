<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.3.2017 г.
 * Time: 01:58 ч.
 */

namespace Data\Users;


class User
{
    private $id;

    private $firstName;

    private $lastName;

    private $username;

    private $password;

    private $phone;

    private $email;

    private $birthday;

    private $gender;

    private $rating;

    private $picture;




    /**
     * GETTERS
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getRating()
    {
        return $this->rating;
    }

    /**
     * SETTERS
     */

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }


}