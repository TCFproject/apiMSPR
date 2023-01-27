<?php

namespace App\Repository;

interface IRepoFindShare
{
    public function findAll();
    public function find($id, $lockMode = null, $lockVersion = null);
    public function findOneBy(array $criteria, array $orderBy = null);
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);

}