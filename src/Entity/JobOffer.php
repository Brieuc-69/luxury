<?php

namespace App\Entity;

use App\Repository\JobOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: JobOfferRepository::class)]
class JobOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finishAt = null;

    #[ORM\ManyToOne(inversedBy: 'jobOffers')]
    private ?Entreprise $entreprise = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column]
    private ?int $salaire = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\ManyToOne(inversedBy: 'jobOffers')]
    private ?Offre $typeOffre = null;

    #[ORM\OneToMany(targetEntity: Metier::class, mappedBy: 'jobOffer')]
    private Collection $metier;

    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'jobOffer')]
    private Collection $candidatures;

    public function __construct()
    {
        $this->metier = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
    }

    

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

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFinishAt(): ?\DateTimeInterface
    {
        return $this->finishAt;
    }

    public function setFinishAt(\DateTimeInterface $finishAt): static
    {
        $this->finishAt = $finishAt;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): static
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): static
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getTypeOffre(): ?Offre
    {
        return $this->typeOffre;
    }

    public function setTypeOffre(?Offre $typeOffre): static
    {
        $this->typeOffre = $typeOffre;

        return $this;
    }

    /**
     * @return Collection<int, Metier>
     */
    public function getMetier(): Collection
    {
        return $this->metier;
    }

    public function addMetier(Metier $metier): static
    {
        if (!$this->metier->contains($metier)) {
            $this->metier->add($metier);
            $metier->setJobOffer($this);
        }

        return $this;
    }

    public function removeMetier(Metier $metier): static
    {
        if ($this->metier->removeElement($metier)) {
            // set the owning side to null (unless already changed)
            if ($metier->getJobOffer() === $this) {
                $metier->setJobOffer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): static
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures->add($candidature);
            $candidature->setJobOffer($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): static
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getJobOffer() === $this) {
                $candidature->setJobOffer(null);
            }
        }

        return $this;
    }
}
