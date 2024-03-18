<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column]
    private ?bool $isDisponible = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $uptdateAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $deletedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\OneToMany(targetEntity: File::class, mappedBy: 'candidat')]
    private Collection $cv;

    #[ORM\OneToMany(targetEntity: File::class, mappedBy: 'candidat')]
    private Collection $passport;

    #[ORM\OneToMany(targetEntity: Genre::class, mappedBy: 'candidat')]
    private Collection $genre;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $nationalite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $birthAt = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuNaissance = null;

    #[ORM\OneToMany(targetEntity: Experience::class, mappedBy: 'candidat')]
    private Collection $experience;

    

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'candidat')]
    private Collection $candidatures;

    #[ORM\ManyToOne(inversedBy: 'candidats')]
    private ?Metier $metier = null;

public function __toString()
{
    return $this->user;
}

    public function __construct()
    {
        $this->cv = new ArrayCollection();
        $this->passport = new ArrayCollection();
        $this->genre = new ArrayCollection();
        $this->experience = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;
        
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function isIsDisponible(): ?bool
    {
        return $this->isDisponible;
    }

    public function setIsDisponible(bool $isDisponible): static
    {
        $this->isDisponible = $isDisponible;

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

    public function getUptdateAt(): ?\DateTimeInterface
    {
        return $this->uptdateAt;
    }

    public function setUptdateAt(\DateTimeInterface $uptdateAt): static
    {
        $this->uptdateAt = $uptdateAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeInterface $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getCv(): Collection
    {
        return $this->cv;
    }

    public function addCv(File $cv): static
    {
        if (!$this->cv->contains($cv)) {
            $this->cv->add($cv);
            $cv->setCandidat($this);
        }

        return $this;
    }

    public function removeCv(File $cv): static
    {
        if ($this->cv->removeElement($cv)) {
            // set the owning side to null (unless already changed)
            if ($cv->getCandidat() === $this) {
                $cv->setCandidat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getPassport(): Collection
    {
        return $this->passport;
    }

    public function addPassport(File $passport): static
    {
        if (!$this->passport->contains($passport)) {
            $this->passport->add($passport);
            $passport->setCandidat($this);
        }

        return $this;
    }

    public function removePassport(File $passport): static
    {
        if ($this->passport->removeElement($passport)) {
            // set the owning side to null (unless already changed)
            if ($passport->getCandidat() === $this) {
                $passport->setCandidat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): static
    {
        if (!$this->genre->contains($genre)) {
            $this->genre->add($genre);
            $genre->setCandidat($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): static
    {
        if ($this->genre->removeElement($genre)) {
            // set the owning side to null (unless already changed)
            if ($genre->getCandidat() === $this) {
                $genre->setCandidat(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getBirthAt(): ?\DateTimeInterface
    {
        return $this->birthAt;
    }

    public function setBirthAt(\DateTimeInterface $birthAt): static
    {
        $this->birthAt = $birthAt;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): static
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * @return Collection<int, Experience>
     */
    public function getExperience(): Collection
    {
        return $this->experience;
    }

    public function addExperience(Experience $experience): static
    {
        if (!$this->experience->contains($experience)) {
            $this->experience->add($experience);
            $experience->setCandidat($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): static
    {
        if ($this->experience->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getCandidat() === $this) {
                $experience->setCandidat(null);
            }
        }

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
            $candidature->setCandidat($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): static
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getCandidat() === $this) {
                $candidature->setCandidat(null);
            }
        }

        return $this;
    }

    public function getMetier(): ?Metier
    {
        return $this->metier;
    }

    public function setMetier(?Metier $metier): static
    {
        $this->metier = $metier;

        return $this;
    }
}
