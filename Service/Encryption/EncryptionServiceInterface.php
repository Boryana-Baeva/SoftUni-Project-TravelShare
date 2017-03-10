<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.3.2017 г.
 * Time: 23:14 ч.
 */

namespace Service\Encryption;


interface EncryptionServiceInterface
{
    public function encrypt($password): string;

    public function isValid($passwordHash, $passwordString): bool;
}