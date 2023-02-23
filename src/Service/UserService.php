<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\IUserRepository;

class UserService implements IUserService
{
    protected User $user;
    protected IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel): void
    {
        // TODO: Implement signUp() method.
        $this->user = new User();
        $this->user->setName($name);
        $this->user->setLastname($lastname);
        $this->user->setEmail($email);
        $this->user->setPassword($psw);
        $this->user->setPhone($tel);
    }

    public function signIn(string $email, string $mdp)
    {
        $this->user = $this->userRepository->findOneBy([
            'email' => $email,
            'password' => $mdp
            ]);
    }
}