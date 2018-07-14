<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource
 * @ORM\Entity
 */
class PlankSize
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
     * @var integer
     *
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $width = 0;

    /**
     * @var integer
     *
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $thickness = 0.05;

    /**
     * @var int
     *
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $length = 6;




    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return self
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getThickness(): int
    {
        return $this->thickness;
    }

    /**
     * @param int $thickness
     * @return self
     */
    public function setThickness(int $thickness): self
    {
        $this->thickness = $thickness;
        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return self
     */
    public function setLength(int $length): self
    {
        $this->length = $length;
        return $this;
    }



}
