<?php

namespace App\Repository;

use App\Entity\User;

class MockUserRepository implements IUserRepository
{
    private $dataUser_mock = array(
        array(
            "Name" => "Jean",
            "Last name" => "Yukito",
            "Age" => 35,
            "Gender" => "Male"
        ),
        array(
            "Name" => "Jane",
            "Last name" => "Yukito",
            "Age" => 25,
            "Gender" => "Female"
        ),
        array(
            "Name" => "Koku",
            "Last name" => "Yukito",
            "Age" => 24,
            "Gender" => "Male"
        ),
        array(
            "Name" => "Yuna",
            "Last name" => "Yukito",
            "Age" => 16,
            "Gender" => "Female"
        ),
        array(
            "Name" => "Jane",
            "Last name" => "Yukito",
            "Age" => 35,
            "Gender" => "Male"
        )
    );
    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->dataUser_mock;
    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        // TODO: Implement find() method.
        return $this->dataUser_mock[$id];
    }

    public function findOneBy(array $criteria, array $orderBy = null)
    {
        // TODO: Implement findOneBy() method.
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        // TODO: Implement findBy() method.
    }

    public function save(User $entity, bool $flush = false): void
    {
        // TODO: Implement save() method.
    }

    public function remove(User $entity, bool $flush = false): void
    {
        // TODO: Implement remove() method.
    }
}