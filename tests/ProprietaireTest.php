<?php

namespace App\Tests;

use App\Entity\Botaniste;
use App\Entity\Commentary;
use App\Entity\Entretien;
use App\Entity\Plante;
use App\Entity\Proprietaire;
use App\Entity\User;
use App\Repository\IBotanistRepo;
use App\Repository\ICommentaryRepository;
use App\Repository\IEntretienRepo;
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

    /**
     * @var IEntretienRepo
     */
    private $entretienRepo;

    /**
     * @var ICommentaryRepository
     */
    private $commentaryRepos;
    private $em;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->em = $kernel->getContainer()->get('doctrine')->getManager();
        $this->userRepository = $kernel->getContainer()->get(IUserRepository::class);
        $this->proprioRepo = $kernel->getContainer()->get(IProprioRepo::class);
        $this->botanistRepo = $kernel->getContainer()->get(IBotanistRepo::class);
        $this->plantRepo = $kernel->getContainer()->get(IPlantRepository::class);
        $this->entretienRepo = $kernel->getContainer()->get(IEntretienRepo::class);
        $this->commentaryRepos = $kernel->getContainer()->get(ICommentaryRepository::class);
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

    public function testAddEntretien(): void {
        $user = $this->userRepository->findOneBy(["name" => "Chang-Fon"]);
        $proprio = $this->proprioRepo->findOneBy(['user'=> $user]);
        $plant = $this->plantRepo->findOneBy([
            'nom' => 'Sapin',
            'nom_latin' => 'Abies'
        ]);
        $new_entretien = new Entretien();
        $new_entretien->setPlant($plant);
        $new_entretien->setTitle("Pppp");
        $new_entretien->setDate(new \DateTime());
        $new_entretien->setIntitule("aaaaaa");
        $new_entretien->setPhoto("photo.png");

        $proprio->addEntretien($new_entretien);
        $this->entretienRepo->save($new_entretien, true);
        $foundEntretien = $this->entretienRepo->findOneBy([
            "title" => "Pppp",
            "intitule" => "aaaaaa",
            "photo" => "photo.png"
        ]);
        $this->assertEquals("Pppp", $foundEntretien->getTitle());
        $this->assertEquals("Chang-Fon", $foundEntretien->getProprietaire()->getUser()->getName());
        $this->assertEquals("Sapin", $foundEntretien->getPlant()->getNom());
    }

    public function testAddCommentary() {
        $user = $this->userRepository->findOneBy(["name" => "Chang"]);
        $botanist = $this->botanistRepo->findOneBy(["user" => $user]);
        $plant = $this->plantRepo->findOneBy([
            'nom' => 'Sapin',
            'nom_latin' => 'Abies'
        ]);
        $commentaire = new Commentary();
        $commentaire->setPlant($plant);
        $commentaire->setComment("Arroser");
        $botanist->addCommentary($commentaire);
        $this->commentaryRepos->save($commentaire, true);

        $foundComment = $this->commentaryRepos->findOneBy([
            "comment" => "Arroser",
            "botanist" => $botanist,
            "plant" => $plant
            ]);
        $this->assertEquals("Arroser",$foundComment->getComment());
        $this->assertEquals("Sapin",$foundComment->getPlant()->getNom());
        $this->assertEquals("Chang",$foundComment->getBotanist()->getUser()->getName());
    }
    protected function tearDown(): void
    {
        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}