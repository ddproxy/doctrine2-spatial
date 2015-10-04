<?php
namespace DDProxy\Spatial\PHP\Types;

use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\PHP\Types\AbstractPoint;

/**
 * Abstract Polygon object for POLYGON spatial types
 */
abstract class AbstractPolygon extends AbstractGeometry
{
    /**
     * @var array[] $rings
     */
    protected $rings = array();

    /**
     * @param AbstractLineString[]|array[] $rings
     * @param null|int                     $srid
     */
    public function __construct(array $rings, $srid = null)
    {
        $this->setRings($rings)
            ->setSrid($srid);
    }

    /**
     * @param AbstractLineString|array[] $ring
     *
     * @return self
     */
    public function addRing($ring)
    {
        $this->rings[] = $this->validateRingValue($ring);

        return $this;
    }

    /**
     * @return AbstractLineString[]
     */
    public function getRings()
    {
        $rings = array();

        for ($i = 0; $i < count($this->rings); $i++) {
            $rings[] = $this->getRing($i);
        }

        return $rings;
    }

    /**
     * @param int $index
     *
     * @return AbstractLineString
     */
    public function getRing($index)
    {
        if (-1 == $index) {
            $index = count($this->rings) - 1;
        }

        $lineStringClass = $this->getNamespace() . '\LineString';

        return new $lineStringClass($this->rings[$index], $this->srid);
    }

    /**
     * @param AbstractLineString[] $rings
     *
     * @return self
     */
    public function setRings(array $rings)
    {
        $this->rings = $this->validatePolygonValue($rings);

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return self::POLYGON;
    }

    /**
     * @return array[]
     */
    public function toArray()
    {
        return $this->rings;
    }
}
