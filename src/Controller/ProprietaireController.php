<?php

namespace App\Controller;

use App\Entity\Entretien;
use App\Entity\Plante;
use App\Service\FileUploader;
use App\Service\IPropriService;
use DateTimeImmutable;
use Proxies\__CG__\App\Entity\Proprietaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ProprietaireController extends AbstractController
{
    private IPropriService $propriService;

    public function __construct(IPropriService $propriService)
    {
        $this->propriService = $propriService;
    }

    #[Route('/proprietaire', name: 'app_proprietaire')]
    public function signIn(Request $request): Response
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

        $proprietaire = $this->propriService->signIn($email, $mdp);

        $encoder = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoder);
        $identity = $serializer->serialize($proprietaire, 'json', ['circular_reference_handler' => function ($object) {
            return $object->getId();
        }]);

        $response = new Response($identity);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Content-Type', 'application/json;charset=UTF-8');
        return $response;
    }

    #[Route('/proprietaire/new', name: 'app_proprietaire_new', methods: ['POST'])]
    public function signUp(Request $request)
    {
        $name = $request->request->get('name');
        $lastName = $request->request->get('lastname');
        $email = $request->request->get('email');
        $pwd = $request->request->get('mdp');
        $tel = $request->request->get('phone');

        $this->propriService->signUp($name, $lastName, $email, $pwd, $tel);
    }

    #[Route('/proprietaire/newPlant', name: 'app_proprietaire_newPlant', methods: ['POST', 'GET'])]
    public function addPlant(Request $request, FileUploader $fileUploader){
        $proprio = $request->request->get("id");
        $photo = $request->files->get('photo');
        $nomPlante = $request->request->get("nom");
        $nom_latinPlante = $request->request->get("nom_latin");
        if (!$photo) {
            throw new FileException('No file uploaded');
        }
        $newPlante = new Plante();
        $newPlante->setNom($nomPlante);
        $newPlante->setNomLatin($nom_latinPlante);
        $newPlante->setPhoto($photo->getClientOriginalName());
        $this->propriService->addPlante($proprio, $newPlante);

        $fileUploader->upload($photo);
    }

    #[Route('/proprietaire/postEntretien', name: 'app_proprietaire_postEntretien', methods: ['POST', 'GET'])]
    public function addEntretien(Request $request, FileUploader $fileUploader) {
        $user = $request->request->get('proprietaire');
        $plante = $request->request->get('plante');

        $title = $request->request->get('title');
        $subject = $request->request->get('content');
        $photo = $request->files->get('photo');
        $date = DateTimeImmutable::createFromFormat('Y-m-d', date('Y-m-d'));
        if (!$photo) {
            throw new FileException('No file uploaded');
        }
        $newEntretien = new Entretien();
        $newEntretien->setTitle($title);
        $newEntretien->setIntitule($subject);
        $newEntretien->setDate($date);
        $newEntretien->setPhoto($photo);

        $this->propriService->addEntretien($user, $plante, $newEntretien);

        $fileUploader->upload($photo);
    }
}
