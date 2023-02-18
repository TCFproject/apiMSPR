<?php

namespace App\Service;

use App\Entity\Entretien;
use App\Entity\Plante;
use App\Repository\IRoleRepo;
use App\Repository\IUserRepository;

class PropriService extends UserService implements IPropriService
{
    private IRoleRepo $roleRepo;

    public function __construct(IUserRepository $userRepository, IRoleRepo $roleRepo)
    {
        parent::__construct($userRepository);
        $this->roleRepo = $roleRepo;
    }

    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel): void
    {
        parent::signUp($name, $lastname, $email, $psw, $tel);
        $this->user->setRole($this->roleRepo->find(2));
        $this->userRepository->save($this->user);
    }

    public function addPlante(int $idProprio, Plante $plant): void
    {
        // TODO: Implement addPlante() method.
    }

    public function addEntretien(int $idProprio, int $idPlante, Entretien $entretien): void
    {
        // TODO: Implement addEntretien() method.
    }
}