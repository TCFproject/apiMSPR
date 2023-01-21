<?php

namespace App\Service;

use App\Entity\Proprietaire;
use App\Entity\User;
use App\Util\TypeUser;

class ProprietaireService implements IUserService
{
    public function newProprietaire(Proprietaire $proprietaire)
    {
        // TODO: Implement newProprietaire() method.
    }

    public function getUsers(): string
    {
        // TODO: Implement getUsers() method.
    }

    public function getOneUsers(int $id): string
    {
        // TODO: Implement getOneUsers() method.
    }

    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel, TypeUser $typeUser): void
    {
        // TODO: Implement signUp() method.
    }

    public function remove(User $entity, bool $flush = false): void
    {
        // TODO: Implement remove() method.
    }
}