<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $numeroCard;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $month;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $year;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $step;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nowStep;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ip;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $montant;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code2;

    #[ORM\Column(type: 'text', nullable: true)]
    private $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCard(): ?string
    {
        return $this->numeroCard;
    }

    public function setNumeroCard(?string $numeroCard): self
    {
        $this->numeroCard = $numeroCard;

        return $this;
    }

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(string $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getStep(): ?string
    {
        return $this->step;
    }

    public function setStep(?string $step): self
    {
        $this->step = $step;

        return $this;
    }

    public function getNowStep(): ?string
    {
        return $this->nowStep;
    }

    public function setNowStep(?string $nowStep): self
    {
        $this->nowStep = $nowStep;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCode2(): ?string
    {
        return $this->code2;
    }

    public function setCode2(string $code2): self
    {
        $this->code2 = $code2;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
