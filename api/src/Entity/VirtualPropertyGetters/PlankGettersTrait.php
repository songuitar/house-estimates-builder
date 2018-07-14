<?php

namespace App\Entity\VirtualPropertyGetters;

use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Plank;

trait PlankGettersTrait
{
    /**
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @return mixed
     */
    public function getPrice()
    {
        return $this->getItemPrice() * $this->count;
    }

    /**
     * @Groups({Plank::GROUP_COLLECTION_GET, Plank::GROUP_ITEM_GET})
     *
     * @return mixed
     */
    public function getItemPrice()
    {
        return (int)($this->getWoodVolume() * $this->woodType->getPrice());
    }

    /**
     * @Groups({Plank::GROUP_ITEM_GET})
     */
    public function getWoodVolume(): float
    {
        return ($this->size->getLength() / 1000) * ($this->size->getThickness() / 1000) * ($this->size->getWidth() / 1000);
    }

    /**
     * @Groups({Plank::GROUP_COLLECTION_GET})
     * @return string
     */
    public function getSizeName()
    {
        return (string) $this->getSize();
    }

    /**
     * @Groups({Plank::GROUP_COLLECTION_GET})
     * @return string
     */
    public function getElementName()
    {
        return (string) $this->getElement();
    }

    /**
     * @Groups({Plank::GROUP_COLLECTION_GET})
     * @return string
     */
    public function getWoodTypeName()
    {
        return (string) $this->getWoodType();
    }
}