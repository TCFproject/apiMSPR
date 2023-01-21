<?php

namespace App\Controller;

use App\Util\IplantTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(IplantTest $plantTest): JsonResponse
    {
        return $this->json($plantTest->display());
    }
}
