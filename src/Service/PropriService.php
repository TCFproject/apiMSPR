<?php

namespace App\Service;

use App\Entity\Entretien;
use App\Entity\Plante;
use App\Repository\IEntretienRepo;
use App\Repository\IPlantRepository;
use App\Repository\IRoleRepo;
use App\Repository\IUserRepository;
use PHPUnit\Util\Exception;

class PropriService extends UserService implements IPropriService
{
    private IRoleRepo $roleRepo;
    private IPlantRepository $plantRepository;

    public function __construct(IUserRepository $userRepository, IRoleRepo $roleRepo, IPlantRepository $plantRepository)
    {
        parent::__construct($userRepository);
        $this->roleRepo = $roleRepo;
        $this->plantRepository = $plantRepository;
    }

    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel): void
    {
        parent::signUp($name, $lastname, $email, $psw, $tel);
        $this->user->setRole($this->roleRepo->find(2));
        $this->userRepository->save($this->user, true);
    }

    /**
     * @throws Exception
     */
    public function signIn(string $email, string $mdp)
    {
        parent::signIn($email, $mdp); // TODO: Change the autogenerated stub
        if ($this->user->getRole()->getLabel() != "Proprietaire") {
            throw new Exception();
        } else {
            return $this->user;
        }
    }

    public function addPlante(int $idProprio, Plante $plant): void
    {
        $foundProprio = $this->userRepository->find($idProprio);
        if ($foundProprio->getRole()->getLabel() == "Proprietaire") {
            $foundProprio->addPlante($plant);
            $this->userRepository->save($foundProprio, true);
        }
    }

    public function addEntretien(int $idProprio, int $idPlante, Entretien $entretien): void
    {
        $foundProprio = $this->userRepository->find($idProprio);
        $foundPlante= $this->plantRepository->find($idPlante);
        $entretien->setPlant($foundPlante);

        if ($foundProprio->getRole()->getLabel() == "Proprietaire") {
            $foundProprio->addEntretien($entretien);
            $this->userRepository->save($foundProprio, true);
        }
    }
}