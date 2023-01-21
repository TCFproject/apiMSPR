<?php

namespace App\Service;

use App\Entity\User;
use App\Util\TypeUser;

interface IUserService
{
    public function getUsers(): string;
    public function getOneUsers(int $id): string;
    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel, TypeUser $typeUser): void;
    public function remove(User $entity, bool $flush = false): void;
}