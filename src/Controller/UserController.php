<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\IUserRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api')]
class UserController extends AbstractController
{
    #[Route('/dashboard', name: 'app_user', methods: ['POST','GET'])]
    public function index() {
        $user = $this->getUser();
        return $this->json([
            'username' => $user->getUserIdentifier(),
            'roles' => $user->getRoles()
        ]);
    }

    #[Route('/new', name: 'app_new_user', methods: ['POST', 'GET'])]
    public function new_user(UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher, Request $request) {

        $email = $request->request->get("email");
        $mdp = $request->request->get("mdp");

        $user = new User();
        $user->setEmail($email);
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $mdp
        );
        $user->setPassword($hashedPassword);

        $userRepository->save($user, true);

        return $this->json(['message' => 'Registered Successfully']);
    }
}
