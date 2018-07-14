<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ApiResource
 * @ORM\Entity
 */
class Element
{
    /**
     * @var int The entity Id
     *
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(type="string")
     */
    private $name;


    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Element
     */
    public function setName(string $name): Element
    {
        $this->name = $name;
        return $this;
    }

}
