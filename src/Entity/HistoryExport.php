<?php
/*
 * Copyright (c) Rafał Mikołajun 2022.
 */

namespace App\Entity;

use App\Entity\Interfaces\TimestampableInterface;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation\ExclusionPolicy;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoryExportRepository")
 * @ORM\Table(name="history_exports")
 *
 * @UniqueEntity(fields={"slug"}, errorPath="slug")
 * @UniqueEntity(fields={"id"}, errorPath="id")
 *
 * @ExclusionPolicy("all")
 */
class HistoryExport implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="guid", name="id", unique=true)
     */
    private string $id;

    /**
     * @ORM\Column(type="string", name="name", nullable=false, length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private string $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", name="slug", unique=true, nullable=false, length=255)
     *
     * @Assert\Length(max=255)
     */
    private string $slug;

    /**
     * @ORM\Column(type="string", name="username", nullable=false, length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private string $username;

    /**
     * @ORM\Column(type="string", name="local_name", nullable=false, length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private string $localName;

    public function __construct(string $name, string $username, string $localName)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->username = $username;
        $this->localName = $localName;
    }

    public function getId(): string|UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getLocalName(): string
    {
        return $this->localName;
    }

    public function setLocalName(string $localName): self
    {
        $this->localName = $localName;

        return $this;
    }
}
