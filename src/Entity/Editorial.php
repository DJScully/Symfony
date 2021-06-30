<?php

namespace App\Entity;

use App\Repository\EditorialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditorialRepository::class)
 */
class Editorial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Libro::class, mappedBy="edicion", orphanRemoval=true)
     */
    private $Nombre;

    /**
     * @ORM\OneToMany(targetEntity=libro::class, mappedBy="Editorial", orphanRemoval=true)
     */
    private $Edit;

    public function __construct()
    {
        $this->Nombre = new ArrayCollection();
        $this->Edit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Libro[]
     */
    public function getNombre(): Collection
    {
        return $this->Nombre;
    }

    public function addNombre(Libro $nombre): self
    {
        if (!$this->Nombre->contains($nombre)) {
            $this->Nombre[] = $nombre;
            $nombre->setEdicion($this);
        }

        return $this;
    }

    public function removeNombre(Libro $nombre): self
    {
        if ($this->Nombre->removeElement($nombre)) {
            // set the owning side to null (unless already changed)
            if ($nombre->getEdicion() === $this) {
                $nombre->setEdicion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|libro[]
     */
    public function getEdit(): Collection
    {
        return $this->Edit;
    }

    public function addEdit(libro $edit): self
    {
        if (!$this->Edit->contains($edit)) {
            $this->Edit[] = $edit;
            $edit->setEditorial($this);
        }

        return $this;
    }

    public function removeEdit(libro $edit): self
    {
        if ($this->Edit->removeElement($edit)) {
            // set the owning side to null (unless already changed)
            if ($edit->getEditorial() === $this) {
                $edit->setEditorial(null);
            }
        }

        return $this;
    }
}
