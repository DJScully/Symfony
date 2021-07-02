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
     * @ORM\Column(type="string", length=20)
     */
    private $ISBN;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $edicion;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $publicacion;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $categoria;

    /**
     * @ORM\ManyToOne(targetEntity=Editorial::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Editorial;

    /**
     * @ORM\ManyToMany(targetEntity=Autor::class, inversedBy="Autores")
     */
    private $Autor;

    public function __construct()
    {
        $this->Autor = new ArrayCollection();
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
        return $this->edicion;
    }

    public function setEdicion(string $edicion): self
    {
        $this->edicion = $edicion;

        return $this;
    }

    public function getPublicacion(): ?string
    {
        return $this->publicacion;
    }

    public function setPublicacion(string $publicacion): self
    {
        $this->publicacion = $publicacion;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getEditorial(): ?editorial
    {
        return $this->Editorial;
    }

    public function setEditorial(?editorial $Editorial): self
    {
        $this->Editorial = $Editorial;

        return $this;
    }

    /**
     * @return Collection|Autor[]
     */
    public function getAutor(): Collection
    {
        return $this->Autor;
    }

    public function addAutor(Autor $autor): self
    {
        if (!$this->Autor->contains($autor)) {
            $this->Autor[] = $autor;
        }

        return $this;
    }

    public function removeAutor(Autor $autor): self
    {
        $this->Autor->removeElement($autor);

        return $this;
    }
}
