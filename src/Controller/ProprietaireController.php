<?php

namespace App\Controller;

use App\Service\IPropriService;
use Proxies\__CG__\App\Entity\Proprietaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ProprietaireController extends AbstractController
{
    #[Route('/proprietaire', name: 'app_proprietaire')]
    public function signIn(IPropriService $propriService, Request $request): Response
    {
        $email = $request->request->get('email');
        $mdp = $request->request->get('mdp');
        $proprietaire = $propriService->signIn($email, $mdp);

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);
        $identity = $serializer->serialize($proprietaire, 'json', ['circular_reference_handler' => function ($object) {
            return $object;
        }]);

        return new Response($identity, headers: ['Content-Type' => 'application/json;charset=UTF-8']);
    }

    #[Route('/proprietaire/new', name: 'app_proprietaire_new', methods: ['POST'])]
    public function signUp(IPropriService $propriService, Request $request)
    {
        $name = $request->request->get('name');
        $lastName = $request->request->get('lastname');
        $email = $request->request->get('email');
        $pwd = $request->request->get('mdp');
        $tel = $request->request->get('phone');

        $propriService->signUp($name, $lastName, $email, $pwd, $tel);
    }
}
