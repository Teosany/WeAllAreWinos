<?php

namespace App\Entity;

use App\Enum\GrapeVarietyStatus;
use App\Repository\GrapeVarietyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: GrapeVarietyRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['slug'], message: 'There is already an Grape with this slug')]
class GrapeVariety
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?GrapeVarietyStatus $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnail = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $plot = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Wine>
     */
    #[ORM\OneToMany(targetEntity: Wine::class, mappedBy: 'grapeVariety')]
    private Collection $wines;

    public function __construct()
    {
        $this->wines = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTimeImmutable('', new \DateTimeZone('Europe/Paris'));
    }
    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTimeImmutable('', new \DateTimeZone('Europe/Paris'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStatus(): ?GrapeVarietyStatus
    {
        return $this->status;
    }

    public function setStatus(GrapeVarietyStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getPlot(): ?string
    {
        return $this->plot;
    }

    public function setPlot(string $plot): static
    {
        $this->plot = $plot;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Wine>
     */
    public function getWines(): Collection
    {
        return $this->wines;
    }

    public function addWine(Wine $wine): static
    {
        if (!$this->wines->contains($wine)) {
            $this->wines->add($wine);
            $wine->setGrapeVariety($this);
        }

        return $this;
    }

    public function removeWine(Wine $wine): static
    {
        if ($this->wines->removeElement($wine)) {
            // set the owning side to null (unless already changed)
            if ($wine->getGrapeVariety() === $this) {
                $wine->setGrapeVariety(null);
            }
        }

        return $this;
    }
}
