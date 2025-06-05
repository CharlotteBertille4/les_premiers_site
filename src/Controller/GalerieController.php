<?php

namespace App\Controller;

use App\Repository\ImageGalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GalerieController extends AbstractController
{
    #[Route('/galerie', name: 'app_galerie')]
    public function index(ImageGalleryRepository $imageGalleryRepository): Response
    {
        $galleries = $imageGalleryRepository->findAll();

        return $this->render('galerie/index.html.twig', [
            'galleries' => $galleries,
        ]);
    }
}
