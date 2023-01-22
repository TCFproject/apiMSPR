<?php

namespace App\Controller;

use App\Repository\IProprioRepo;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use App\Util\IplantTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(UserRepository $proprioRepo): JsonResponse
    {
        return $this->json($proprioRepo->findAll());
    }
}
