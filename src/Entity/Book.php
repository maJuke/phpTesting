<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */

class Book implements \JsonSerializable
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfCreation;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $description;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfCreation() : ?DateTime
    {
        return $this->dateOfCreation;
    }


    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param mixed $title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param DateTimeInterface $dateOfCreation
     * @return Book
     */
    public function setDateOfCreation(DateTimeInterface $dateOfCreation): self
    {
        $this->dateOfCreation = $dateOfCreation;
        return $this;
    }

    /**
     * @param mixed $description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'dateOfCreation'=>$this->dateOfCreation,
            'description'=>$this->description,
        ];
    }
}