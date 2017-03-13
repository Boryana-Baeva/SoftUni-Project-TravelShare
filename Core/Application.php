<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.3.2017 г.
 * Time: 15:51 ч.
 */

namespace Core;


class Application
{
    public function checkLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }
    }
}
