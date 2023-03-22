<?php

namespace App\Repository;

use App\Entity\Users;
use App\Repository\BaseInterface\IRepoFindShare;

interface IUserRepository extends IRepoFindShare
{
    public function save(Users $entity, bool $flush = false): void;
    public function remove(Users $entity, bool $flush = false): void;
}