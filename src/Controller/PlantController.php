<?php

namespace App\Controller;

use App\Service\IUserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlantController extends AbstractController
{
    #[Route('/plant', name: 'app_plant')]
    public function index(IUserService $userService): Response
    {
        return new Response($userService->getUsers());
    }
}
