<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.3.2017 г.
 * Time: 00:21 ч.
 */

namespace Service\Town;


use Data\Towns\AllTownsViewData;


interface TownServiceInterface
{
    public function load(): AllTownsViewData;
}