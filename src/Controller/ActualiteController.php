<?php

namespace App\Controller;

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
}
