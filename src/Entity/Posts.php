<?php

namespace App\Entity;

use App\Repository\Post\PostsRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PostsRepository::class)
 *@UniqueEntity("slug" )
 *@ORM\HasLifecycleCallbacks()
 *@Vich\Uploadable()
 */
class Posts
{

    const STATES = ['STATE_DRAFT', 'STATE_PUBLISHED'];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $state = POSTS::STATES[0];

    /**
     * @ORM\Column(type="datetime", length=255)
     */
    private $createdOn;

    /**
     * @ORM\Column(type="datetime", length=255)
     */
    private $updatedOn;

    /**
     *
     * @ORM\OneToMany(targetEntity=Thumbnail::class, mappedBy="posts",cascade={"persist"},fetch="EAGER")
     */
    private $thumbnail;

    public function __contruct()
    {
        $this->updatedon = new \DateTimeImmutable();
        $this->createdon = new \DateTimeImmutable();
        $this->images = new ArrayCollection();

    }

    /**
     *@ORM\PrePersist
     */
    public function PrePersist()
    {
        $this->slug = (new Slugify())->slugify($this->title);

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setslug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }
    /**
     * @return Collection<int, thumbnail>
     */
    public function getThumbnail(): Collection
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Thumbnail $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

}
