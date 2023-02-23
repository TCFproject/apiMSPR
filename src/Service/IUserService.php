<?php

namespace App\Service;

use App\Entity\User;

interface IUserService
{
    public function signIn(string $email, string $mdp);
    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel): void;
}