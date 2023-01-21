<?php

namespace App\Service;

use App\Entity\Botaniste;
use App\Entity\Proprietaire;
use App\Entity\User;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use App\Util\TypeUser;

class UserService implements IUserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers(): string
    {
        // TODO: Implement getUsers() method.
        return json_encode($this->userRepository->findAll());
    }

    public function remove(User $entity, bool $flush = false): void
    {
        // TODO: Implement remove() method.
        $this->userRepository->remove($entity, $flush);
    }

    public function getOneUsers(int $id): string
    {
        // TODO: Implement getOneUsers() method.
        return json_encode($this->userRepository->find($id));
    }

    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel, TypeUser $typeUser): void
    {
        // TODO: Implement signUp() method.
        $user = new User();
        $user->setName($name);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setPassword($psw);
        $user->setPhone($tel);

        if ($typeUser == TypeUser::proprietaire){
            $proprie = new Proprietaire();
            $proprie->setUser($user);
        }
        if ($typeUser == TypeUser::botaniste){
            $botanist = new Botaniste();
            $botanist->setUser($user);
        }
    }
}