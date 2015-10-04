<?php
namespace DDProxy\Spatial\PHP\Types\Geography;

use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\PHP\Types\AbstractPoint;

/**
 * Point object for POINT geography type
 */
class Point extends AbstractPoint implements GeographyInterface
{
    /**
     * {@inheritdoc}
     */
    public function setX($x)
    {
        $x = $this->toFloat($x);

        if ($x < -180 || $x > 180) {
            throw InvalidValueException::invalidLongitude($x);
        }

        $this->x = $x;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setY($y)
    {
        $y = $this->toFloat($y);

        if ($y < -90 || $y > 90) {
            throw InvalidValueException::invalidLatitude($y);
        }

        $this->y = $y;

        return $this;
    }
}
