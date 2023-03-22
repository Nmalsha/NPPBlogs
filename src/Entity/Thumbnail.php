<?php

namespace App\Entity;

use App\Repository\Post\ThumbnailRepository;
use Doctrine\ORM\Mapping as ORM;
// use Vich\UploaderBundle\Entity\File;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ThumbnailRepository::class)
 * *@ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Thumbnail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    // /**
    //  * @ORM\Column(type="integer", length=255)
    //  */
    // private $imageSize;

    /**
     * @ORM\Column(type="datetime", length=255)
     */
    private $createdOn;

    /**
     * @ORM\Column(type="datetime", length=255)
     */
    private $updatedOn;

/**
 * @ORM\ManyToOne(targetEntity=Posts::class, inversedBy="Thumbnail" )
 */
    private $posts;

    public function __contruct()
    {
        $this->updatedon = new \DateTimeImmutable();
        $this->createdon = new \DateTimeImmutable();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedon = new \DateTimeImmutable();

    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }
    // public function setImageSize(string $imageSize): void
    // {
    //     $this->imageSize = $imageSize;
    // }
    // public function getImageSize(): ?string
    // {
    //     return $this->imageSize;
    // }
    public function getCreatedOn(): ?\DateTimeImmutable
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeImmutable$createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }
    public function getUpdatedOn(): ?\DateTimeImmutable
    {
        return $this->updatedOn;
    }

    public function setUpdatedOn(\DateTimeImmutable$updatedOn): self
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }
    public function getPosts(): Posts
    {
        return $this->posts;
    }

    public function setPosts(string $posts): self
    {
        $this->posts = $posts;

        return $this;
    }

}
