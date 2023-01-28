<?php

namespace App\Tests;

use App\Entity\Botaniste;
use App\Entity\Plante;
use App\Entity\Proprietaire;
use App\Entity\User;
use App\Repository\IBotanistRepo;
use App\Repository\IPlantRepository;
use App\Repository\IProprioRepo;
use App\Repository\IUserRepository;
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

    /**
     * @var IPlantRepository
     */
    private $plantRepo;
    private $em;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();
        $this->userRepository = $kernel->getContainer()->get(IUserRepository::class);
        $this->proprioRepo = $kernel->getContainer()->get(IProprioRepo::class);
        $this->botanistRepo = $kernel->getContainer()->get(IBotanistRepo::class);
        $this->plantRepo = $kernel->getContainer()->get(IPlantRepository::class);
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
        $this->assertEquals($user->getName(),$foundUser->getName());

        $this->proprioRepo->save($proprietaire, true);
        $foundProprio = $this->proprioRepo->findOneBy(["user" => $user]);
        $this->assertSame($proprietaire, $foundProprio);
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
        $this->assertEquals($user->getName(),$foundUser->getName());

        $this->botanistRepo->save($botanist, true);
        $foundBota = $this->botanistRepo->findOneBy(["user" => $user]);
        $this->assertSame($botanist, $foundBota);
    }
    public function testProprioExist(): void{
        $listProprio = $this->proprioRepo->findAll();
        $this->assertNotNull($listProprio);
    }

    public function testAddPlant(): void {
        $user = $this->userRepository->findOneBy(["name" => "Chang-Fon"]);
        $proprio = $this->proprioRepo->findOneBy(['user'=>$user]);
        $newPlante = new Plante();
        $newPlante->setNom('Sapin');
        $newPlante->setNomLatin('Abies');
        $newPlante->setPhoto('sapin.png');
        $newPlante->setProprietaire($proprio);
        $this->plantRepo->save($newPlante, true);

        $foundPlante = $this->plantRepo->findOneBy([
            'nom' => 'Sapin',
            'nom_latin' => 'Abies'
            ]);
        $this->assertEquals('Sapin',$foundPlante->getNom());
    }

    /*public function testAddEntretien(): void{

    }*/

    protected function tearDown(): void
    {
        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}
