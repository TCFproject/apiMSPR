<?php

namespace App\Tests;

use App\Entity\Role;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepoTest extends KernelTestCase
{
    private $entityManager;
    private $UserRepository;
    private $RoleRepository;

    public function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
        $this->UserRepository = $this->entityManager->getRepository(User::class);
        $this->RoleRepository = $this->entityManager->getRepository(Role::class);

        if ($this->RoleRepository->findOneBy(['label' => 'Botaniste']) == null) {
            $newRole = new Role();
            $newRole->setLabel('Botaniste');
            $this->RoleRepository->save($newRole, true);
        }
        if ($this->RoleRepository->findOneBy(['label' => 'Proprietaire']) == null) {
            $newRole = new Role();
            $newRole->setLabel('Proprietaire');
            $this->RoleRepository->save($newRole, true);
        }
    }

    public function testDbConnection()
    {
        $this->entityManager->getConnection()->connect();
        $this->assertTrue($this->entityManager->getConnection()->isConnected());
    }

    public function testDbAvailability()
    {
        $conn = $this->entityManager->getConnection();
        $conn->connect();
        $this->assertTrue($conn->isConnected());
    }

    public function testRoleExist(){
        $BotaExist = $this->RoleRepository->findOneBy(['label' => 'Botaniste']);
        $this->assertEquals('Botaniste', $BotaExist->getLabel());
        $PropriExist = $this->RoleRepository->findOneBy(['label' => 'Proprietaire']);
        $this->assertEquals('Proprietaire', $PropriExist->getLabel());
    }

    public function testNewBotanist() {
        $bota = $this->RoleRepository->findOneBy(['label' => 'Botaniste']);
        $newBotanist = new User();
        $newBotanist->setRole($bota);
        $newBotanist->setName("Chang");
        $newBotanist->setLastname("Thierry");
        $newBotanist->setEmail("CCC@ttt.com");
        $newBotanist->setPassword("cccTTT");
        $newBotanist->setPhone("0147294538");

        $this->UserRepository->save($newBotanist, true);
        $this->entityManager->refresh($newBotanist);
        $foundBota = $this->UserRepository->findOneBy([
            'role' => $bota,
            'name' => 'Chang',
            'lastname' => 'Thierry',
        ]);
        $this->assertEquals('Botaniste',$foundBota->getRole()->getLabel());
        $this->assertEquals('Chang',$foundBota->getName());
        $this->assertEquals('Thierry',$foundBota->getLastname());
    }

    public function testNewProprietaire() {
        $proprio = $this->RoleRepository->findOneBy(['label' => 'Proprietaire']);
        $newProprietaire = new User();
        $newProprietaire->setRole($proprio);
        $newProprietaire->setName("Fong");
        $newProprietaire->setLastname("Thierry");
        $newProprietaire->setEmail("CCC@ttt.com");
        $newProprietaire->setPassword("cccTTT");
        $newProprietaire->setPhone("0147294538");

        $this->UserRepository->save($newProprietaire, true);
        $this->entityManager->refresh($newProprietaire);
        $foundPropri = $this->UserRepository->findOneBy([
            'role' => $proprio,
            'name' => 'Fong',
            'lastname' => 'Thierry',
        ]);
        $this->assertEquals('Proprietaire',$foundPropri->getRole()->getLabel());
        $this->assertEquals('Fong',$foundPropri->getName());
        $this->assertEquals('Thierry',$foundPropri->getLastname());
    }

    public function testRemoveUsers()
    {
        $bota = $this->RoleRepository->findOneBy(['label' => 'Botaniste']);
        $foundBota = $this->UserRepository->findOneBy([
            'role' => $bota,
            'name' => 'Chang',
            'lastname' => 'Thierry',
        ]);
        $this->UserRepository->remove($foundBota, true);
        $this->assertNull($foundBota->getId());

        $proprio = $this->RoleRepository->findOneBy(['label' => 'Proprietaire']);
        $foundPropri = $this->UserRepository->findOneBy([
            'role' => $proprio,
            'name' => 'Fong',
            'lastname' => 'Thierry',
        ]);
        $this->UserRepository->remove($foundPropri, true);
        $this->assertNull($foundPropri->getId());
    }
}
