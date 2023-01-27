<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\IUserRepository;
use App\Util\TypeUser;

class MockUserService implements IUserService
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

    public function save(User $entity, bool $flush = false): void
    {
        // TODO: Implement save() method.
        $this->userRepository->save($entity, $flush);
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
    }
}