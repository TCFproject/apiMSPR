<?php

namespace App\Repository;

use App\Entity\Proprietaire;
use App\Entity\User;

interface IUserRepository
{
    public function findAll();
    public function find($id, $lockMode = null, $lockVersion = null);
    public function findOneBy(array $criteria, array $orderBy = null);
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);
    public function save($entity, bool $flush = false): void;
    public function remove($entity, bool $flush = false): void;
}