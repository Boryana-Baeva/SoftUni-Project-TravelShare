<?php

namespace Service\User;

use Adapter\DatabaseInterface;
use Exceptions\RegisterException;
use Service\Encryption\EncryptionServiceInterface;
use Data\Users\User;

class UserService implements UserServiceInterface
{
    const MIN_AGE_ALLOWED = 18;

    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    public function __construct(DatabaseInterface $db,
                                EncryptionServiceInterface $encryptionService)
    {
        $this->db = $db;
       $this->encryptionService = $encryptionService;
    }

    public function register(string $firstName,
                             string $lastName,
                             string $username,
                             string $email,
                             string $password,
                             string $confirmPassword,
                             \DateTime $birthday,
                             string $gender,
                             string $phone)
    {
        if ($password != $confirmPassword) {
            throw new RegisterException("Password mismatch");
        }

        $passwordHash = $this->encryptionService->encrypt($password);


        $interval = $birthday->diff(new \DateTime('now'));
        if ($interval->y < self::MIN_AGE_ALLOWED) {
            throw new RegisterException("Underage not allowed");
        }

        $query = "INSERT INTO users (
                       first_name,
                       last_name,
                       username,
                       email,
                       password,
                       date_of_birth,
                       gender,
                       phone_number  
                    ) VALUES (
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?
                    );";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
            [
                $firstName,
                $lastName,
                $username,
                $email,
                $passwordHash,
                $birthday->format('Y-m-d'),
                $gender,
                $phone
            ]
        );
    }

    public function login($email, $password): bool
    {
        $query = "SELECT
                   id,
                   username,
                   password
                FROM
                   users
                WHERE
                   email = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
            [
                $email
            ]
        );
        /** @var User $user */
        $user = $stmt->fetchObject(User::class);
        if (!$user) {
            return false;
        }

        $passwordHash = $user->getPassword();

        if ($this->encryptionService->isValid($passwordHash, $password)) {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['username'] = $user->getUsername();
            return true;
        }

        return false;
    }

}
