<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource
 * @ORM\Entity
 */
class WoodType
{
    /**
     * @var int The entity Id
     *
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @var float
     * @Assert\NotBlank
     * @ORM\Column(type="float")
     */
    private $price;


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
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return WoodType
     */
    public function setPrice(float $price): WoodType
    {
        $this->price = $price;
        return $this;
    }
}
