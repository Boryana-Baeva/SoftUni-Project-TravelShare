<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.3.2017 г.
 * Time: 18:45 ч.
 */

namespace Service\User;


interface UserServiceInterface
{
    public function exists($username): bool;
    
    public function register(string $firstName,
                             string $lastName,
                             string $username,
                             string $email,
                             string $password,
                             string $confirmPassword,
                             \DateTime $birthday,
                             string $gender,
                             string $phone);
    
    public function  login($email, $password);

    public function findById($id);
    
}