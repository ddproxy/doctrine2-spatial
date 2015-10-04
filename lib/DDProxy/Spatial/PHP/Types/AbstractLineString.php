<?php
namespace DDProxy\Spatial\PHP\Types;

use DDProxy\Spatial\Exception\InvalidValueException;

/**
 * Abstract LineString object for LINESTRING spatial types
 */
abstract class AbstractLineString extends AbstractMultiPoint
{
    /**
     * @return string
     */
    public function getType()
    {
        return self::LINESTRING;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        if ($this->points[0] === $this->points[count($this->points) - 1]) {
            return true;
        }

        return false;
    }
}
