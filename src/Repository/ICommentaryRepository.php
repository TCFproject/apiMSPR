<?php

namespace App\Repository;

use App\Entity\Commentary;
use App\Repository\BaseInterface\IRepoFindShare;

interface ICommentaryRepository extends IRepoFindShare
{
    public function save(Commentary $entity, bool $flush = false): void;
    public function remove(Commentary $entity, bool $flush = false): void;
}