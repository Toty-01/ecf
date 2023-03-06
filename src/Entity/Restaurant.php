<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $couvert = null;

    #[ORM\Column(length: 255)]
    private ?string $ouv_midi = null;
    
    #[ORM\Column(length: 255)]
    private ?string $ferm_midi = null;
    
    #[ORM\Column(length: 255)]
    private ?string $ouv_soir = null;
    
    #[ORM\Column(length: 255)]
    private ?string $ferm_soir = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }
    
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        
        return $this;
    }
    
    public function getCouvert(): ?int
    {
        return $this->couvert;
    }

    public function setCouvert(int $couvert): self
    {
        $this->couvert = $couvert;

        return $this;
    }
    
    public function getOuvMidi(): ?string
    {
        return $this->ouv_midi;
    }
    
    public function setOuvMidi(string $ouv_midi): self
    {
        $this->ouv_midi = $ouv_midi;

        return $this;
    }

    public function getFermMidi(): ?string
    {
        return $this->ferm_midi;
    }

    public function setFermMidi(string $ferm_midi): self
    {
        $this->ferm_midi = $ferm_midi;
        
        return $this;
    }

    public function getOuvSoir(): ?string
    {
        return $this->ouv_soir;
    }

    public function setOuvSoir(string $ouv_soir): self
    {
        $this->ouv_soir = $ouv_soir;

        return $this;
    }

    public function getFermSoir(): ?string
    {
        return $this->ferm_soir;
    }

    public function setFermSoir(string $ferm_soir): self
    {
        $this->ferm_soir = $ferm_soir;

        return $this;
    }

}
