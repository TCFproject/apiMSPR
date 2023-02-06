<?php

namespace App\Repository;

use App\Entity\Plante;
use App\Repository\BaseInterface\IRepoFindShare;

interface IPlantRepository extends IRepoFindShare
{
    public function save(Plante $entity, bool $flush = false): void;
    public function remove(Plante $entity, bool $flush = false): void;
}