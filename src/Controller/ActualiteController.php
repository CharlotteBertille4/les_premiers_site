<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'app_actualite')]
    public function index(ActualiteRepository $actualiteRepository): Response
    {
        $actualites = $actualiteRepository->findBy(['isPublished' => true]);

        return $this->render('actualite/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }

    #[Route('/actualite/{id}', name: 'actualite_show')]
    public function show(Actualite $actualite): Response
    {
        return $this->render('actualite/show.html.twig', [
            'actualite' => $actualite,
        ]);
    }
}
