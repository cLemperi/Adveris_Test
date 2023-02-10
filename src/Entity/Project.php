<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $price_sold = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $estimatedTimeToCompletion = null;

    #[ORM\Column(nullable: true)]
    private ?int $spentTime = null;

    #[ORM\Column(length: 255)]
    private ?string $technology = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $company = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $workers = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPriceSold(): ?int
    {
        return $this->price_sold;
    }

    public function setPriceSold(int $price_sold): self
    {
        $this->price_sold = $price_sold;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEstimatedTimeToCompletion(): ?int
    {
        return $this->estimatedTimeToCompletion;
    }

    public function setEstimatedTimeToCompletion(?int $estimatedTimeToCompletion): self
    {
        $this->estimatedTimeToCompletion = $estimatedTimeToCompletion;

        return $this;
    }

    public function getSpentTime(): ?int
    {
        return $this->spentTime;
    }

    public function setSpentTime(?int $spentTime): self
    {
        $this->spentTime = $spentTime;

        return $this;
    }

    public function getTechnology(): ?string
    {
        return $this->technology;
    }

    public function setTechnology(string $technology): self
    {
        $this->technology = $technology;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getWorkers(): array
    {
        return $this->workers;
    }

    public function setWorkers(?array $workers): self
    {
        $this->workers = $workers;

        return $this;
    }

}
