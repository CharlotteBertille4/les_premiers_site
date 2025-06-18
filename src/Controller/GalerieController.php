<?php

namespace App\Controller;

use App\Repository\ImageGalleryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GalerieController extends AbstractController
{
    #[Route('/galerie', name: 'app_galerie')]
    public function index(
        ImageGalleryRepository $imageGalleryRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $query = $imageGalleryRepository->createQueryBuilder('g')
            ->orderBy('g.createdAt', 'DESC')
            ->getQuery();

        $galleries_pagination = $paginator->paginate(
            $query, /* query */
            $request->query->getInt('page', 1), /* page number */
            6 /* limit per page */
        );

        return $this->render('galerie/index.html.twig', [
            'galleries_pagination' => $galleries_pagination,
        ]);
    }
}
