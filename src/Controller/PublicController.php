<?php

namespace App\Controller;


use App\Repository\EtablissementRepository;
use App\Repository\ImageGalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PublicController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(
//        EtablissementRepository $etablissementRepository,
//        ImageGalleryRepository $imageGalleryRepository
    ): Response
    {
        // On suppose qu’il n’y a qu’un seul enregistrement
//        $etablissement = $etablissementRepository->findOneBy([]);
//        $galleries = $imageGalleryRepository->findAll();


        return $this->render('public/index.html.twig', [
//            'etablissement' => $etablissement,
//            'galleries' => $galleries,

        ]);
    }

    #[Route('/a-propos', name: 'a_propos')]
    public function aPropos(): Response
    {
        return $this->render('public/a_propos.html.twig');
    }

    #[Route('/formations', name: 'formations')]
    public function formations(): Response
    {
        return $this->render('public/formations.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('public/contact.html.twig');
    }
}
