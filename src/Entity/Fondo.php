<?php

namespace App\Entity;

use App\Repository\FondoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FondoRepository::class)
 */
class Fondo
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
    private $Titulo;

    /**
     * @ORM\Column(type="array")
     */
    private $Autores = [];

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ISBN;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $Edicion;

    /**
     * @ORM\ManyToMany(targetEntity=Catalogo::class)
     */
    private $Publicacion;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $Categoría;

    public function __construct()
    {
        $this->Publicacion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->Titulo;
    }

    public function setTitulo(string $Titulo): self
    {
        $this->Titulo = $Titulo;

        return $this;
    }

    public function getAutores(): ?array
    {
        return $this->Autores;
    }

    public function setAutores(array $Autores): self
    {
        $this->Autores = $Autores;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(string $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getEdicion(): ?string
    {
        return $this->Edicion;
    }

    public function setEdicion(string $Edicion): self
    {
        $this->Edicion = $Edicion;

        return $this;
    }

    /**
     * @return Collection|Catalogo[]
     */
    public function getPublicacion(): Collection
    {
        return $this->Publicacion;
    }

    public function addPublicacion(Catalogo $publicacion): self
    {
        if (!$this->Publicacion->contains($publicacion)) {
            $this->Publicacion[] = $publicacion;
        }

        return $this;
    }

    public function removePublicacion(Catalogo $publicacion): self
    {
        $this->Publicacion->removeElement($publicacion);

        return $this;
    }

    public function getCategoría(): ?string
    {
        return $this->Categoría;
    }

    public function setCategoría(?string $Categoría): self
    {
        $this->Categoría = $Categoría;

        return $this;
    }
}
