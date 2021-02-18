<?php

namespace App\Entity;

use App\Repository\DeliveryInformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryInformationRepository::class)
 */
class DeliveryInformation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="deliveryInformation")
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDelivery;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $ttimeDelivery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthdayPersonName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthdayPersonPhonenUmber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getDateDelivery(): ?\DateTimeInterface
    {
        return $this->dateDelivery;
    }

    public function setDateDelivery(?\DateTimeInterface $dateDelivery): self
    {
        $this->dateDelivery = $dateDelivery;

        return $this;
    }

    public function getTtimeDelivery(): ?\DateTimeInterface
    {
        return $this->ttimeDelivery;
    }

    public function setTtimeDelivery(?\DateTimeInterface $ttimeDelivery): self
    {
        $this->ttimeDelivery = $ttimeDelivery;

        return $this;
    }

    public function getBirthdayPersonName(): ?string
    {
        return $this->birthdayPersonName;
    }

    public function setBirthdayPersonName(?string $birthdayPersonName): self
    {
        $this->birthdayPersonName = $birthdayPersonName;

        return $this;
    }

    public function getBirthdayPersonPhonenUmber(): ?string
    {
        return $this->birthdayPersonPhonenUmber;
    }

    public function setBirthdayPersonPhonenUmber(?string $birthdayPersonPhonenUmber): self
    {
        $this->birthdayPersonPhonenUmber = $birthdayPersonPhonenUmber;

        return $this;
    }
}
