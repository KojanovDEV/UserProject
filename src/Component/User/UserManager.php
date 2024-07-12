<?php

declare(strict_types=1);

namespace App\Component\User;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class UserManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(User $user, bool $isNeadFlush = false): void
    {
        $this->entityManager->persist($user);

        if ($isNeadFlush) {
            $this->entityManager->flush();
        }
    }

}