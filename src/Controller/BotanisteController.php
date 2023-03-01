<?php

namespace App\Controller;

use App\Service\IBotanistService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BotanisteController extends AbstractController
{
    private IBotanistService $botanistService;

    public function __construct(IBotanistService $botanistService)
    {
        $this->botanistService = $botanistService;
    }

    #[Route('/botaniste', name: 'app_botaniste')]
    public function index(Request $request): Response
    {
        $email = "";
        $mdp = "";
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $mdp = $request->request->get('mdp');
        } elseif ($request->isMethod('GET')) {
            $email = $request->query->get('email');
            $mdp = $request->query->get('mdp');
        }

        $botaniste = $this->botanistService->signIn($email, $mdp);

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);
        $identity = $serializer->serialize($botaniste, 'json', ['circular_reference_handler' => function ($object) {
            return $object->getId();
        }]);
        $response = new Response($identity);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Content-Type', 'application/json;charset=UTF-8');
        return $response;
    }

    #[Route('/botaniste/new', name: 'app_botaniste_new', methods: ['POST'])]
    public function signUp(Request $request)
    {
        $name = $request->request->get('name');
        $lastName = $request->request->get('lastname');
        $email = $request->request->get('email');
        $pwd = $request->request->get('mdp');
        $tel = $request->request->get('phone');

        $this->botanistService->signUp($name, $lastName, $email, $pwd, $tel);
    }

    #[Route('/botaniste/list', name: 'app_botaniste_list')]
    public function send_list(): Response {
        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);
        $identity = $serializer->serialize($this->botanistService->getPlant(), 'json', ['circular_reference_handler' => function ($object) {
            return $object->getId();
        }]);
        $response = new Response($identity);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Content-Type', 'application/json;charset=UTF-8');
        return $response;
    }

    #[Route('/botaniste/comment', name: 'app_botaniste_comment', methods: ['POST'])]
    public function addComment(Request $request) {
        $intitule = $request->request->get('auteur');
        $plante = $request->request->get('plante');
        $comment = $request->request->get('commentaire');
        $this->botanistService->addCommentary($comment, $plante, $intitule);
    }
}
