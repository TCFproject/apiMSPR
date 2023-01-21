<?php

namespace App\Service;

use App\Entity\Proprietaire;

interface IPropriService
{
    public function newProprietaire(Proprietaire $proprietaire);
}