<?php

namespace App\Controller;

use App\Repository\IProprioRepo;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(UserRepository $proprioRepo): JsonResponse
    {
        return $this->json($proprioRepo->find(1)->getName(), headers: ['Content-Type' => 'application/json;charset=UTF-8']);
    }
}
