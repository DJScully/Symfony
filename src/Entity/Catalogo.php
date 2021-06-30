<?php

namespace App\Entity;

use App\Repository\CatalogoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CatalogoRepository::class)
 */
class Catalogo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Autor;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ISBN;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Editorial;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $Publicacion;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $Edicion;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Categoria;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->Autor;
    }

    public function setAutor(string $Autor): self
    {
        $this->Autor = $Autor;

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

    public function getEditorial(): ?string
    {
        return $this->Editorial;
    }

    public function setEditorial(string $Editorial): self
    {
        $this->Editorial = $Editorial;

        return $this;
    }

    public function getPublicacion(): ?string
    {
        return $this->Publicacion;
    }

    public function setPublicacion(string $Publicacion): self
    {
        $this->Publicacion = $Publicacion;

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

    public function getCategoria(): ?string
    {
        return $this->Categoria;
    }

    public function setCategoria(string $Categoria): self
    {
        $this->Categoria = $Categoria;

        return $this;
    }
}
