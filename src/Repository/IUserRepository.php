<?php

namespace App\Repository;

use App\Entity\User;
use App\Repository\BaseInterface\IRepoFindShare;

interface IUserRepository extends IRepoFindShare
{
    public function save(User $entity, bool $flush = false): void;
    public function remove(User $entity, bool $flush = false): void;
}