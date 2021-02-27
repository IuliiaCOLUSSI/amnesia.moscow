<?php

namespace App\Entity;

use App\Repository\FeedBackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeedBackRepository::class)
 */
class FeedBack
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titleEng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptionEng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $authorEng;

    /**
     * @ORM\ManyToOne(targetEntity=Website::class, inversedBy="feedBacks")
     */
    private $website;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getTitleEng(): ?string
    {
        return $this->titleEng;
    }

    public function setTitleEng(?string $titleEng): self
    {
        $this->titleEng = $titleEng;

        return $this;
    }

    public function getDescriptionEng(): ?string
    {
        return $this->descriptionEng;
    }

    public function setDescriptionEng(?string $descriptionEng): self
    {
        $this->descriptionEng = $descriptionEng;

        return $this;
    }

    public function getAuthorEng(): ?string
    {
        return $this->authorEng;
    }

    public function setAuthorEng(?string $authorEng): self
    {
        $this->authorEng = $authorEng;

        return $this;
    }

    public function getWebsite(): ?Website
    {
        return $this->website;
    }

    public function setWebsite(?Website $website): self
    {
        $this->website = $website;

        return $this;
    }
}
