<?php

namespace App\Entity;

use App\Repository\VideoGalleryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoGalleryRepository::class)]
class VideoGallery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlYoutube = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $videoFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateAjout = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getUrlYoutube(): ?string
    {
        return $this->urlYoutube;
    }

    public function setUrlYoutube(?string $urlYoutube): static
    {
        $this->urlYoutube = $urlYoutube;

        return $this;
    }

    public function getVideoFile(): ?string
    {
        return $this->videoFile;
    }

    public function setVideoFile(?string $videoFile): static
    {
        $this->videoFile = $videoFile;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateAjout(): ?\DateTime
    {
        return $this->dateAjout;
    }

    public function setDateAjout(?\DateTime $dateAjout): static
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }
}
