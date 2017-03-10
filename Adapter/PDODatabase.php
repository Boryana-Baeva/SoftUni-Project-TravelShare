<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7.3.2017 г.
 * Time: 16:29 ч.
 */

namespace Adapter;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(string $host,
                                string $dbName,
                                string $user,
                                string $password)
    {
        $dsn = "mysql:dbname=" . $dbName . ";host=" . $host . ";charset=utf8";
        $this->pdo = new \PDO($dsn, $user, $password);
    }


    public function prepare($sql): DatabaseStatementInterface
    {
        /**
         * @var \PDOStatement $pdoStatement
         */
        $pdoStatement = $this->pdo->prepare($sql);

        return new PDODatabaseStatement($pdoStatement);

        
    }

    public function lastId()
    {
        $this->pdo->lastInsertId();
    }

    public function errorInfo()
    {
       $this->pdo->errorInfo();
    }
}