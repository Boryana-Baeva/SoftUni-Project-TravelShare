<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.3.2017 г.
 * Time: 00:40 ч.
 */

namespace Data\Towns;


class AllTownsViewData
{
    /**
     * @var \Generator|Town[]
     */
    private $towns;

    /**
     * @return Town[]|\Generator
     */
    public function getTowns()
    {
        return $this->towns;
    }

    /**
     * @param callable
     */
    public function setTowns(callable $towns)
    {
        $this->towns = $towns();
    }
}