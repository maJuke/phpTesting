<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */

class Author implements \JsonSerializable
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
    private $fio;

    /**
     * @ORM\Column(type="integer")
     */
    private $bk_counter;

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
    public function getFio() : ?string
    {
        return $this->fio;
    }

    /**
     * @return int|null
     */
    public function getBkCounter() : ?int
    {
        return $this->bk_counter;
    }

    /**
     * @param mixed $fio
     */
    public function setFio(string $fio): self
    {
        $this->fio = $fio;
        return $this;
    }

    /**
     * @param mixed $bk_counter
     */
    public function setBkCounter(int $bk_counter): self
    {
        $this->bk_counter = $bk_counter;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id'=>$this->id,
            'fio'=>$this->fio,
            'bk_counter'=>$this->bk_counter,
        ];
    }
}