<?php

namespace App\Repository;

use App\Entity\User;

interface IUserRepository
{
    public function findAll();
    public function find($id, $lockMode = null, $lockVersion = null);
    public function findOneBy(array $criteria, array $orderBy = null);
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);
    public function save(User $entity, bool $flush = false): void;
    public function remove(User $entity, bool $flush = false): void;
}