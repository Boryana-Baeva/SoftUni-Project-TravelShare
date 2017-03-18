<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.3.2017 г.
 * Time: 22:56 ч.
 */

namespace Data\Users;


class UserViewData
{
    private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $birthdate;
    private $gender;
    private $email;
    private $phoneNumber;
    private $rating;
    private $picture;


    public function getBirthdate()
    {
        return $this->birthdate;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }


    public function getGender()
    {
        return $this->gender;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
    
}
