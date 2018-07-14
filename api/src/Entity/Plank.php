<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Entity\VirtualPropertyGetters\PlankGettersTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET}},
 *     denormalizationContext={"groups"={Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET}},
 *     collectionOperations={
 *          "get"={
 *                "normalization_context"={"groups"={Plank::GROUP_COLLECTION_GET}}
 *           }
 *     },
 *     itemOperations={
 *          "get"={
 *                "normalization_context"={"groups"={Plank::GROUP_ITEM_GET}}
 *           }
 *     }
 * )
 * @ORM\Entity
 */
class Plank
{

    const GROUP_COLLECTION_GET = 'plank_collection_get';
    const GROUP_ITEM_GET = 'plank_item_get';

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
     * @var PlankSize
     *
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @ORM\ManyToOne(targetEntity="PlankSize")
     * @ORM\JoinColumn(name="size_id", referencedColumnName="id")
     *
     * @Assert\NotBlank
     */
    private $size;

    /**
     * @var Element
     *
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @ORM\ManyToOne(targetEntity="Element")
     * @ORM\JoinColumn(name="element_id", referencedColumnName="id", nullable=true)
     */
    private $element;

    /**
     * @var WoodType
     *
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @ORM\ManyToOne(targetEntity="WoodType")
     * @ORM\JoinColumn(name="wood_type_id", referencedColumnName="id", nullable=true)
     */
    private $woodType;

    /**
     * @var int
     *
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @ORM\Column(type="integer")
     */
    private $count = 0;

    /**
     * @var string
     *
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @ORM\Column(type="text", options={"default":""})
     * @Assert\NotBlank
     */
    private $description = '';



    public function getId(): int
    {
        return $this->id;
    }

    /**
     *
     * @return PlankSize
     */
    public function getSize(): PlankSize
    {
        return $this->size;
    }

    /**
     * @param PlankSize $size
     * @return Plank
     */
    public function setSize(PlankSize $size): Plank
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Plank
     */
    public function setDescription(string $description): Plank
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return Plank
     */
    public function setCount(int $count): Plank
    {
        $this->count = $count;
        return $this;
    }

    /**
     *
     * @return Element
     */
    public function getElement(): ? Element
    {
        return $this->element;
    }

    /**
     * @param Element $element
     * @return Plank
     */
    public function setElement(? Element $element): Plank
    {
        $this->element = $element;
        return $this;
    }

    /**
     *
     * @return WoodType
     */
    public function getWoodType(): ? WoodType
    {
        return $this->woodType;
    }

    /**
     * @param WoodType $woodType
     * @return Plank
     */
    public function setWoodType(? WoodType $woodType): ? Plank
    {
        $this->woodType = $woodType;
        return $this;
    }
}
