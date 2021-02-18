<?php

namespace App\Entity;

use App\Repository\DeliveryInformationRepository;
use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

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
    private $timeDelivery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthdayPersonName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthdayPersonPhonenUmber;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     * 
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

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

    public function getTimeDelivery(): ?\DateTimeInterface
    {
        return $this->timeDelivery;
    }

    public function setTimeDelivery(?\DateTimeInterface $timeDelivery): self
    {
        $this->timeDelivery = $timeDelivery;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
