<?php

namespace App\Controller;

use App\Repository\IUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(IUserRepository $proprioRepo): Response
    {
        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);
        $json = $serializer->serialize($proprioRepo->findAll(), 'json', ['circular_reference_handler' => function ($object) {
            return $object->getId();
        }]);
        return new Response($json, headers: ['Content-Type' => 'application/json;charset=UTF-8']);
    }
}
