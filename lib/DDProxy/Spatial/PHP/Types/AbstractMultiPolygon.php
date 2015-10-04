<?php
namespace DDProxy\Spatial\PHP\Types;

use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\PHP\Types\AbstractPoint;

/**
 * Abstract Polygon object for POLYGON spatial types
 */
abstract class AbstractMultiPolygon extends AbstractGeometry
{
    /**
     * @var array[] $polygons
     */
    protected $polygons = array();

    /**
     * @param AbstractPolygon[]|array[] $polygons
     * @param null|int                     $srid
     */
    public function __construct(array $polygons, $srid = null)
    {
        $this->setPolygons($polygons)
            ->setSrid($srid);
    }

    /**
     * @param AbstractPolygon|array[] $polygon
     *
     * @return self
     */
    public function addPolygon($polygon)
    {
        $this->polygons[] = $this->validatePolygonValue($polygon);

        return $this;
    }

    /**
     * @return AbstractPolygon[]
     */
    public function getPolygons()
    {
        $polygons = array();

        for ($i = 0; $i < count($this->polygons); $i++) {
            $polygons[] = $this->getPolygon($i);
        }

        return $polygons;
    }

    /**
     * @param int $index
     *
     * @return AbstractPolygon
     */
    public function getPolygon($index)
    {
        if (-1 == $index) {
            $index = count($this->polygons) - 1;
        }

        $polygonClass = $this->getNamespace() . '\Polygon';

        return new $polygonClass($this->polygons[$index], $this->srid);
    }

    /**
     * @param AbstractPolygon[] $polygons
     *
     * @return self
     */
    public function setPolygons(array $polygons)
    {
        $this->polygons = $this->validateMultiPolygonValue($polygons);

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return self::MULTIPOLYGON;
    }

    /**
     * @return array[]
     */
    public function toArray()
    {
        return $this->polygons;
    }
}
