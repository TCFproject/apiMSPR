<?php

namespace App\Repository;

use App\Entity\Botaniste;
use App\Repository\BaseInterface\IRepoFindShare;

interface IBotanistRepo extends IRepoFindShare
{
    public function save(Botaniste $entity, bool $flush = false): void;
    public function remove(Botaniste $entity, bool $flush = false): void;
}