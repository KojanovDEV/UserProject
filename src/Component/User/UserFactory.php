<?php

declare(strict_types=1);

namespace App\Component\User;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFactory
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function create(string $email, string $password, string $fullname, string $surname, int $age): User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setFullname($fullname);
        $user->setSurname($surname);
        $user->setAge($age);
        $hashedPassword = $this->passwordHasher->hashPassword($user, $password);
        $user->setPassword($hashedPassword);

        return $user;
    }

}