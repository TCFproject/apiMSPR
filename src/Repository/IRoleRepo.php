<?php

namespace App\Repository;

use App\Entity\Role;
use App\Repository\BaseInterface\IRepoFindShare;

interface IRoleRepo extends IRepoFindShare
{
    public function save(Role $entity, bool $flush = false): void;
    public function remove(Role $entity, bool $flush = false): void;
}