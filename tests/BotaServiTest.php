<?php

namespace App\Tests;

use App\Entity\Plante;
use App\Entity\User;
use App\Repository\ICommentaryRepository;
use App\Repository\IPlantRepository;
use App\Repository\PlanteRepository;
use App\Service\IBotanistService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BotaServiTest extends KernelTestCase
{
    private $BotaServ;
    private $entityManager;
    private $plantRepository;
    private $commentaryRepository;

    protected function setUp(): void {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
        $this->plantRepository = $kernel->getContainer()->get(IPlantRepository::class);
        $this->BotaServ = $kernel->getContainer()->get(IBotanistService::class);
        $this->commentaryRepository = $kernel->getContainer()->get(ICommentaryRepository::class);
    }

    public function testSign() {
        $this->BotaServ->signUp("Fabien", "Frederic", "iii@eee.fr", "iiieee", "0967124512");
        $foundPropri = $this->BotaServ->signIn("iii@eee.fr", "iiieee");
        $this->assertNotNull($foundPropri->getId());
        $this->assertEquals("Botaniste", $foundPropri->getRole()->getLabel());
    }
    public function testAddCommentary() {
        $foundPropri = $this->BotaServ->signIn("iii@eee.fr", "iiieee");

        $recupPlant = $this->plantRepository->findOneBy([
            "nom" => "flower",
            "nom_latin" => "flower_latin",
            "photo" => "coucou.png"
        ]);
        $this->BotaServ->addCommentary("aaa", $recupPlant->getId(), $foundPropri->getId());
        $foundComment = $this->commentaryRepository->findOneBy([
            "comment" => "aaa",
            "plant" => $recupPlant,
            "user" => $foundPropri
        ]);
        $this->assertEquals("aaa", $foundComment->getComment());
        $this->assertEquals($recupPlant->getId(), $foundComment->getPlant()->getId());
        $this->assertEquals($foundPropri->getId(), $foundComment->getUser()->getId());
    }
}
