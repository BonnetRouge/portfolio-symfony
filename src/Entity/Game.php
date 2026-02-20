<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[Assert\NotBlank(message: "Le nom de l'équipe domicile ne doit pas être vide !")]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: "Le nom de l'équipe doit faire plus de 2 caractères.",
        maxMessage: "Le nom de l'équipe doit faire moins de 100 caractères."
    )]
    #[ORM\Column(length: 100)]
    private string $homeTeam;

    #[Assert\NotBlank(message: "Le nom de l'équipe extérieur ne doit pas être vide !")]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: "Le nom de l'équipe doit faire plus de 2 caractères.",
        maxMessage: "Le nom de l'équipe doit faire moins de 100 caractères."
    )]
    #[ORM\Column(length: 100)]
    private string $awayTeam;

    #[Assert\NotBlank(message: "La date du game ne doit pas être vide !")]
    #[ORM\Column]
    private DateTime $date;

    #[Assert\NotBlank(message: "Le stade ne doit pas être vide !")]
    #[ORM\Column(length: 100)]
    private string $stadium;

    #[Assert\NotBlank(message: "La compétition ne doit pas être vide !")]
    #[ORM\Column(length: 100)]
    private string $competition;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $newId): self
    {
        $this->id = $newId;
        return $this;
    }


    




    /**
     * Get the value of date
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the value of stadium
     */
    public function getStadium(): string
    {
        return $this->stadium;
    }

    /**
     * Set the value of stadium
     */
    public function setStadium(string $stadium): self
    {
        $this->stadium = $stadium;
        return $this;
    }

    /**
     * Get the value of competition
     */
    public function getCompetition(): string
    {
        return $this->competition;
    }

    /**
     * Set the value of competition
     */
    public function setCompetition(string $competition): self
    {
        $this->competition = $competition;
        return $this;
    }

    /**
     * Get the value of homeTeam
     */ 
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set the value of homeTeam
     *
     * @return  self
     */ 
    public function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    /**
     * Get the value of awayTeam
     */ 
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set the value of awayTeam
     *
     * @return  self
     */ 
    public function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }
}