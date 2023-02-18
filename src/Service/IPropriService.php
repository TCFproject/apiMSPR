<?php

namespace App\Service;

use App\Entity\Entretien;
use App\Entity\Plante;

interface IPropriService extends IUserService
{
    public function addPlante(int $idProprio, Plante $plant): void;
    public function addEntretien(int $idProprio, int $idPlante, Entretien $entretien): void;
}