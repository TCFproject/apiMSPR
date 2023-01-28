<?php

namespace App\Repository;

use App\Entity\Entretien;
use App\Repository\BaseInterface\IRepoFindShare;

interface IEntretienRepo extends IRepoFindShare
{
    public function save(Entretien $entity, bool $flush = false): void;
    public function remove(Entretien $entity, bool $flush = false): void;
}