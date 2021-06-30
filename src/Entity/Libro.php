<?php

namespace App\Entity;

use App\Repository\LibroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LibroRepository::class)
 */
class Libro
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
    private $titulo;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $ISBN;

    /**
     * @ORM\ManyToOne(targetEntity=Editorial::class, inversedBy="Nombre")
     * @ORM\JoinColumn(nullable=false)
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
     * @ORM\ManyToMany(targetEntity=Autor::class, mappedBy="Tipo")
     */
    private $Autores;

    /**
     * @ORM\ManyToOne(targetEntity=Editorial::class, inversedBy="Edit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Editorial;

    public function __construct()
    {
        $this->Autores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

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

    public function getEdicion(): ?Editorial
    {
        return $this->edicion;
    }

    public function setEdicion(?Editorial $edicion): self
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

    /**
     * @return Collection|Autor[]
     */
    public function getAutores(): Collection
    {
        return $this->Autores;
    }

    public function addAutore(Autor $autore): self
    {
        if (!$this->Autores->contains($autore)) {
            $this->Autores[] = $autore;
            $autore->addTipo($this);
        }

        return $this;
    }

    public function removeAutore(Autor $autore): self
    {
        if ($this->Autores->removeElement($autore)) {
            $autore->removeTipo($this);
        }

        return $this;
    }

    public function getEditorial(): ?Editorial
    {
        return $this->Editorial;
    }

    public function setEditorial(?Editorial $Editorial): self
    {
        $this->Editorial = $Editorial;

        return $this;
    }
}
