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
     * @ORM\ManyToMany(targetEntity=Libro::class, inversedBy="Autores")
     */
    private $Tipo;

    public function __construct()
    {
        $this->Tipo = new ArrayCollection();
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

    /**
     * @return Collection|Libro[]
     */
    public function getTipo(): Collection
    {
        return $this->Tipo;
    }

    public function addTipo(Libro $tipo): self
    {
        if (!$this->Tipo->contains($tipo)) {
            $this->Tipo[] = $tipo;
        }

        return $this;
    }

    public function removeTipo(Libro $tipo): self
    {
        $this->Tipo->removeElement($tipo);

        return $this;
    }
}
