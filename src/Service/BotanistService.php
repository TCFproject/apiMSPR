<?php

namespace App\Service;

use App\Entity\Commentary;
use App\Entity\Plante;
use App\Entity\User;
use App\Repository\IPlantRepository;
use App\Repository\IRoleRepo;
use App\Repository\IUserRepository;

class BotanistService extends UserService implements IBotanistService
{
    private IPlantRepository $plantRepository;
    private IRoleRepo $roleRepo;
    public function __construct(IUserRepository $userRepository, IPlantRepository $plantRepository, IRoleRepo $roleRepo)
    {
        parent::__construct($userRepository);
        $this->plantRepository = $plantRepository;
        $this->roleRepo = $roleRepo;
    }

    public function signUp(string $name, string $lastname, string $email, string $psw, string $tel): void
    {
        parent::signUp($name, $lastname, $email, $psw, $tel);
        $this->user->setRole($this->roleRepo->find(["label" => "Botaniste"]));
        $this->userRepository->save($this->user, true);
    }

    public function getPlant()
    {
        return $this->plantRepository->findAll();
    }

    public function addCommentary(string $comment, int $idPlant, int $idBotanist): void
    {
        $newComment = new Commentary();
        $newComment->setComment($comment);
    }
}