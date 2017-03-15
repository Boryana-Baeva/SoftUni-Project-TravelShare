<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.3.2017 г.
 * Time: 00:25 ч.
 */

namespace Service\Town;


use Adapter\DatabaseInterface;
use Data\Towns\AllTownsViewData;
use Data\Towns\Town;

class TownService implements TownServiceInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;

    }
    
    public function load(): AllTownsViewData
    {
        $query = "SELECT 
                    id,
                    town_name AS name
                  FROM
                    towns";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $allTowns = new AllTownsViewData();

        $lazyLoadedAllTowns = function () use ($stmt) {
            /** @var Town $town */
            while ($town = $stmt->fetchObject(Town::class)) {

                yield $town;
            }
        };
        $allTowns->setTowns($lazyLoadedAllTowns);

        return $allTowns;
    }
}