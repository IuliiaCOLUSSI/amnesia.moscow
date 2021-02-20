<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\WebsiteRepository;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=WebsiteRepository::class)
 * @Vich\Uploadable
 */
class Website
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
    private $mainBackgroundImage;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="website_background_image", fileNameProperty="mainBackgroundImage")
     *
     * @var File
     */
    private $mainBackgroundImageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aboutUsBackgroundImage;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="about_us_background_image", fileNameProperty="aboutUsBackgroundImage")
     *
     * @var File
     */
    private $aboutUsBackgroundImageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=CatalogCategory::class, mappedBy="website",cascade={"persist"})
     */
    private $catalogCategory;

    /**
     * @ORM\OneToMany(targetEntity=Partner::class, mappedBy="website",cascade={"persist"})
     */
    private $partners;

    public function __construct()
    {
        $this->catalogCategory = new ArrayCollection();
        $this->partners = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainBackgroundImage(): ?string
    {
        return $this->mainBackgroundImage;
    }

    public function setMainBackgroundImage(?string $mainBackgroundImage): self
    {
        $this->mainBackgroundImage = $mainBackgroundImage;

        return $this;
    }

    public function setMainBackgroundImageFile (File $mainBackgroundImage = null)
    {
        $this->mainBackgroundImageFile = $mainBackgroundImage;

        if ($mainBackgroundImage) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getMainBackgroundImageFile()
    {
        return $this->mainBackgroundImageFile;
    }


    public function getAboutUsBackgroundImage(): ?string
    {
        return $this->aboutUsBackgroundImage;
    }

    public function setAboutUsBackgroundImage(?string $aboutUsBackgroundImage): self
    {
        $this->aboutUsBackgroundImage = $aboutUsBackgroundImage;

        return $this;
    }

    public function setAboutUsBackgroundImageFile (File $aboutUsBackgroundImage = null)
    {
        $this->aboutUsBackgroundImageFile = $aboutUsBackgroundImage;

        if ($aboutUsBackgroundImage) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getAboutUsBackgroundImageFile()
    {
        return $this->aboutUsBackgroundImageFile;
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

    /**
     * @return Collection|CatalogCategory[]
     */
    public function getCatalogCategory(): Collection
    {
        return $this->catalogCategory;
    }

    public function addCatalogCategory(CatalogCategory $catalogCategory): self
    {
        if (!$this->catalogCategory->contains($catalogCategory)) {
            $this->catalogCategory[] = $catalogCategory;
            $catalogCategory->setWebsite($this);
        }

        return $this;
    }

    public function removeCatalogCategory(CatalogCategory $catalogCategory): self
    {
        if ($this->catalogCategory->removeElement($catalogCategory)) {
            // set the owning side to null (unless already changed)
            if ($catalogCategory->getWebsite() === $this) {
                $catalogCategory->setWebsite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Partner[]
     */
    public function getPartners(): Collection
    {
        return $this->partners;
    }

    public function addPartner(Partner $partner): self
    {
        if (!$this->partners->contains($partner)) {
            $this->partners[] = $partner;
            $partner->setWebsite($this);
        }

        return $this;
    }

    public function removePartner(Partner $partner): self
    {
        if ($this->partners->removeElement($partner)) {
            // set the owning side to null (unless already changed)
            if ($partner->getWebsite() === $this) {
                $partner->setWebsite(null);
            }
        }

        return $this;
    }
}
