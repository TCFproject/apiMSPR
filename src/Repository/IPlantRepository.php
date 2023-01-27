<?php

namespace App\Repository;

use App\Entity\Plante;

interface IPlantRepository extends IRepoFindShare
{
    public function save(Plante $entity, bool $flush = false): void;
    public function remove(Plante $entity, bool $flush = false): void;
}