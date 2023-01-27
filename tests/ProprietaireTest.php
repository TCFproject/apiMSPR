<?php

namespace App\Tests;

use App\Entity\Botaniste;
use App\Entity\Proprietaire;
use App\Entity\User;
use App\Repository\IBotanistRepo;
use App\Repository\IProprioRepo;
use App\Repository\IUserRepository;
use App\Repository\ProprietaireRepository;
use App\Repository\UserRepository;
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
    /**
     * @var IBotanistRepo
     */
    private $botanistRepo;
    private $em;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();
        $this->userRepository = $kernel->getContainer()->get(IUserRepository::class);
        $this->proprioRepo = $kernel->getContainer()->get(IProprioRepo::class);
        $this->botanistRepo = $kernel->getContainer()->get(IBotanistRepo::class);
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
        $conn = $this->em->getConnection();
        $conn->connect();
        $this->assertTrue($conn->isConnected());
    }

    public function testNewProprietaire():void{
        $user = new User();
        $user->setName("Chang-Fon");
        $user->setLastname("Thierry");
        $user->setEmail("ooo@aaa.fr");
        $user->setPassword("motDePasse");
        $user->setPhone("0745093465");
        $proprietaire = new Proprietaire();
        $proprietaire->setUser($user);

        $this->userRepository->save($user, true);
        $foundUser = $this->userRepository->findOneBy(["name" => "Chang-Fon"]);
        $this->assertNotNull($foundUser);

        $this->proprioRepo->save($proprietaire, true);
        $foundProprio = $this->proprioRepo->findOneBy(["user" => $user]);
        $this->assertNotNull($foundProprio);
    }

    public function testNewBotanist(): void{
        $user = new User();
        $user->setName("Chang");
        $user->setLastname("Thierry");
        $user->setEmail("ooo@aaa.fr");
        $user->setPassword("motDePasse");
        $user->setPhone("0745093465");
        $botanist = new Botaniste();
        $botanist->setUser($user);

        $this->userRepository->save($user, true);
        $foundUser = $this->userRepository->findOneBy(["name" => "Chang"]);
        $this->assertNotNull($foundUser);

        $this->botanistRepo->save($botanist, true);
        $foundBota = $this->botanistRepo->findOneBy(["user" => $user]);
        $this->assertNotNull($foundBota);
    }
    public function testProprioExist(): void{
        $listProprio = $this->proprioRepo->findAll();
        $this->assertNotNull($listProprio);
    }
    protected function tearDown(): void
    {
        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}
