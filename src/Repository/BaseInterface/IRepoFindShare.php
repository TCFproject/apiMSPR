<?php

namespace App\Repository\BaseInterface;

interface IRepoFindShare
{
    public function findAll();
    public function find($id, $lockMode = null, $lockVersion = null);
    public function findOneBy(array $criteria, array $orderBy = null);
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);

}