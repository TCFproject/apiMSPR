<?php

namespace App\Tests;

use App\Repository\BotanisteRepository;
use App\Service\IPropriService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProprietaireTest extends KernelTestCase
{
    private IPropriService $propriService;

    protected function setUp(): void
    {
        $this->repo = new BotanisteRepository();
    }

    public function testNewProprietaire(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }
}
