<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $requiredAge;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxPeople;

    /**
     * @ORM\Column(type="integer")
     */
    private $currentPeople;

    /*
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /*
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getRequiredAge(): ?int
    {
        return $this->requiredAge;
    }

    public function setRequiredAge(int $requiredAge): self
    {
        $this->requiredAge = $requiredAge;

        return $this;
    }

    public function getMaxPeople(): ?int
    {
        return $this->maxPeople;
    }

    public function setMaxPeople(int $maxPeople): self
    {
        $this->maxPeople = $maxPeople;

        return $this;
    }

    public function getCurrentPeople(): ?int
    {
        return $this->currentPeople;
    }

    public function setCurrentPeople(int $currentPeople): self
    {
        $this->currentPeople = $currentPeople;

        return $this;
    }

    /**
     * Get /*
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get /*
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
