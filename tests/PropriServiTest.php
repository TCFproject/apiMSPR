<?php

namespace App\Tests;

use App\Entity\Entretien;
use App\Entity\Plante;
use App\Repository\IEntretienRepo;
use App\Repository\IPlantRepository;
use App\Repository\IUserRepository;
use App\Service\IPropriService;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PropriServiTest extends KernelTestCase
{
    private $entityManager;
    private $Container;
    private $PropriServ;
    private $plantRepository;
    private $entretienRepo;

    public function setUp(): void {
        $kernel = self::bootKernel();
        $this->Container = $kernel->getContainer();
        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
        $this->PropriServ = $kernel->getContainer()->get(IPropriService::class);
        $this->plantRepository = $kernel->getContainer()->get(IPlantRepository::class);
        $this->entretienRepo = $kernel->getContainer()->get(IEntretienRepo::class);
    }

    public function testSign() {
        $this->PropriServ->signUp("Chang-Fong", "Thierry", "ooo@aaa.fr", "aaaooo", "0967124512");
        $foundPropri = $this->PropriServ->signIn("ooo@aaa.fr", "aaaooo");
        $this->assertNotNull($foundPropri->getId());
        $labelName = $foundPropri->getRole()->getLabel();
        $this->assertEquals("Proprietaire", $labelName);
    }

    public function testAddPlant() {
        $newPlant = new Plante();
        $newPlant->setNom("flower");
        $newPlant->setNomLatin("flower_latin");
        $newPlant->setPhoto("coucou.png");

        $foundPropri = $this->PropriServ->signIn("ooo@aaa.fr", "aaaooo");
        $this->PropriServ->addPlante($foundPropri->getId(), $newPlant);

        $recupPlant = $this->plantRepository->findOneBy([
            "nom" => "flower",
            "nom_latin" => "flower_latin",
            "photo" => "coucou.png"
        ]);

        $this->assertEquals("flower",$recupPlant->getNom());
        $this->assertEquals("flower_latin",$recupPlant->getNomLatin());
        $this->assertEquals("Chang-Fong", $recupPlant->getUser()->getName());
        $this->assertEquals("ooo@aaa.fr", $recupPlant->getUser()->getEmail());
        $this->assertEquals("aaaooo", $recupPlant->getUser()->getPassword());
    }

    public function testAddEntretien() {
        $newEntretien = new Entretien();
        $newEntretien->setTitle("Entretien 1");
        $newEntretien->setIntitule("Intituler entretien 1");
        $newEntretien->setPhoto("photoEntretien.png");
        $date = DateTimeImmutable::createFromFormat('Y-m-d', date('Y-m-d'));
        $newEntretien->setDate($date);

        $foundPropri = $this->PropriServ->signIn("ooo@aaa.fr", "aaaooo");
        $recupPlant = $this->plantRepository->findOneBy([
            "nom" => "flower",
            "nom_latin" => "flower_latin",
            "photo" => "coucou.png"
        ]);
        $this->PropriServ->addEntretien($foundPropri->getId(), $recupPlant->getId(), $newEntretien);

        $recupEntretien = $this->entretienRepo->findOneBy([
            "title" => "Entretien 1",
            "photo" => "photoEntretien.png",
            "intitule" => "Intituler entretien 1"
        ]);
        $this->assertEquals("Entretien 1", $recupEntretien->getTitle());
        $this->assertEquals("Chang-Fong", $recupEntretien->getUser()->getName());
        $this->assertEquals("Thierry", $recupEntretien->getUser()->getLastname());
    }
}
