<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.3.2017 г.
 * Time: 00:29 ч.
 */

namespace Data\Towns;


class Town
{
    private $id;
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    
}