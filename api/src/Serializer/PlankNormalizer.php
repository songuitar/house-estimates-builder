<?php
// api/src/Serializer/ApiNormalizer

namespace App\Serializer;

use App\Entity\Plank;
use App\Entity\PlankSize;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class PlankNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    private $decorated;

    public function __construct(NormalizerInterface $decorated)
    {
        if (!$decorated instanceof DenormalizerInterface) {
            throw new \InvalidArgumentException(sprintf('The decorated normalizer must implement the %s.', DenormalizerInterface::class));
        }

        $this->decorated = $decorated;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Plank && $this->decorated->supportsNormalization($data, $format);
    }

    /**
     * @inheritdoc
     * @param Plank $object
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = $this->decorated->normalize($object, $format, $context);

        if (is_array($data)) {
            $data['woodVolume'] = number_format($this->getWoodVolume($object->getSize()) * $object->getCount(), 3);
            $data['itemPrice'] = (int)($object->getWoodType()->getPrice() * $this->getWoodVolume($object->getSize()));
            $data['price'] = $object->getCount() * $data['itemPrice'];
        }
        if (!in_array(Plank::GROUP_ITEM_GET, $context['groups'])) {
            $data['size'] = $this->getSizeString($object->getSize());
            $data['woodType'] = $object->getWoodType()->getName();
            $data['element'] = $object->getElement()->getName();
        }

        return $data;
    }


    /**
     * @param PlankSize $size
     * @return string
     */
    private function getSizeString(PlankSize $size) : string
    {
        return $size->getThickness().'*'.$size->getWidth().'*'.$size->getLength();
    }

    /**
     * @param PlankSize $size
     * @return float
     */
    private function getWoodVolume(PlankSize $size): float
    {
        return $this->toMeters($size->getLength()) * $this->toMeters($size->getThickness()) * $this->toMeters($size->getWidth());
    }

    /**
     * @param int $mm
     * @return float
     */
    private function toMeters(int $mm): float
    {
        return $mm / 1000;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $this->decorated->supportsDenormalization($data, $type, $format);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return $this->decorated->denormalize($data, $class, $format, $context);
    }

    public function setSerializer(SerializerInterface $serializer)
    {
        if ($this->decorated instanceof SerializerAwareInterface) {
            $this->decorated->setSerializer($serializer);
        }
    }
}