<?php

namespace App\Repository;

use App\Entity\Proprietaire;
use App\Repository\BaseInterface\IRepoFindShare;

interface IProprioRepo extends IRepoFindShare
{
    public function save(Proprietaire $entity, bool $flush = false): void;
    public function remove(Proprietaire $entity, bool $flush = false): void;
}