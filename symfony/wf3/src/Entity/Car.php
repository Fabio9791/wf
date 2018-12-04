<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"car", "car.id"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice({"red","green","black"})
     * @Groups({"car", "car.color"})
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"car", "car.model"})
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Groups({"car", "car.brand"})
     */
    private $brand;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Seat")
     * @Assert\Count(
     *      min = 1,
     *      max = 7,
     *      minMessage = "You must specify at least one seat",
     *      maxMessage = "You cannot specify more than 7 seats"
     * )
     * @Groups({"car", "car.seats"})
     */
    private $seats;

    public function __construct()
    {
        $this->seats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection|Seat[]
     */
    public function getSeats(): Collection
    {
        return $this->seats;
    }

    public function addSeat(Seat $seat): self
    {
        if (!$this->seats->contains($seat)) {
            $this->seats[] = $seat;
        }

        return $this;
    }

    public function removeSeat(Seat $seat): self
    {
        if ($this->seats->contains($seat)) {
            $this->seats->removeElement($seat);
        }

        return $this;
    }
}
