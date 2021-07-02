<?php

namespace App\Entity;

use App\Repository\AutorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutorRepository::class)
 */
class Autor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Tipo;

    /**
     * @ORM\ManyToMany(targetEntity=Fondo::class, mappedBy="Autor")
     */
    private $Autores;

    public function __construct()
    {
        $this->Autores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->Tipo;
    }

    public function setTipo(string $Tipo): self
    {
        $this->Tipo = $Tipo;

        return $this;
    }
 
    /**
     * @return Collection|Fondo[]
     */
    public function getAutores(): Collection
    {
        return $this->Autores;
    }

    public function addAutore(Fondo $autore): self
    {
        if (!$this->Autores->contains($autore)) {
            $this->Autores[] = $autore;
            $autore->addAutor($this);
        }

        return $this;
    }

    public function removeAutore(Fondo $autore): self
    {
        if ($this->Autores->removeElement($autore)) {
            $autore->removeAutor($this);
        }

        return $this;
    }
}
