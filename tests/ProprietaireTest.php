<?php

namespace App\Tests;

use App\Entity\Proprietaire;
use App\Entity\User;
use App\Repository\IProprioRepo;
use App\Repository\IUserRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProprietaireTest extends WebTestCase
{
    /**
     * @var IProprioRepo
     */
    private $proprioRepo;
    /**
     * @var IUserRepository
     */
    private $userRepository;
    private $em;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();
        $this->userRepository = $kernel->getContainer()->get(IUserRepository::class);
        $this->proprioRepo = $kernel->getContainer()->get(IProprioRepo::class);
    }

    public function testSetEntity(): void
    {
        $user = new User();
        $user->setName("Chang-Fong");
        $user->setLastname("Thierry");
        $user->setEmail("ooo@aaa.fr");
        $user->setPassword("motDePasse");
        $user->setPhone("0745093465");
        $proprietaire = new Proprietaire();
            $proprietaire->setUser($user);

        $this->assertEquals($user->getName(), "Chang-Fong");
        $this->assertEquals($user->getLastname(), "Thierry");
        $this->assertEquals($user->getEmail(), "ooo@aaa.fr");
        $this->assertEquals($user->getPassword(), "motDePasse");
        $this->assertEquals($user->getPhone(), "0745093465");
        $this->assertSame($proprietaire->getUser(), $user);
    }
    public function testDbConnection()
    {
        $this->em->getConnection()->connect();
        $this->assertTrue($this->em->getConnection()->isConnected());
    }

    public function testDbAvailability()
    {
        try {
            $conn = $this->em->getConnection();
            $this->assertTrue($conn->isConnected());
        } catch (Exception $e) {
            $this->fail("Error while connecting to the database : " . $e->getMessage());
        }
    }

    public function testNewProprietaire():void{
        $user = new User();
        $user->setName("Chang-Fong");
        $user->setLastname("Thierry");
        $user->setEmail("ooo@aaa.fr");
        $user->setPassword("motDePasse");
        $user->setPhone("0745093465");
        $this->userRepository->save($user);
        $proprietaire = new Proprietaire();
        $proprietaire->setUser($user);

        $this->proprioRepo->save($proprietaire);
        $foundUser = $this->userRepository->findOneBy(['Name'=>"Chang-Fong"]);
        $this->assertSame($user,$foundUser);
    }
}
