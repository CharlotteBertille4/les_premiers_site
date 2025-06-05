<?php

namespace App\Twig;

use App\Repository\EtablissementRepository;
use Twig\Extension\GlobalsInterface;
use Twig\Extension\AbstractExtension;


class AppExtension extends AbstractExtension implements GlobalsInterface
{
    private $etablissementRepository;

    public function __construct(EtablissementRepository $etablissementRepository)
    {
        $this->etablissementRepository = $etablissementRepository;
    }

    public function getGlobals(): array
    {
        $etablissement = $this->etablissementRepository->findOneBy([]);

        return [
            'etablissement' => $etablissement ?: null,
        ];
    }
}