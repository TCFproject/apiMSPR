<?php

namespace App\Service;

use App\Entity\Plante;
use App\Entity\User;

interface IBotanistService extends IUserService
{
    public function getPlant();
    public function addCommentary(string $comment, int $idPlant, int $idBotanist): void;

}