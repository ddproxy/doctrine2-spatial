<?php
namespace DDProxy\Doctrine\DBAL\Types\Geometry;

use DDProxy\Doctrine\DBAL\Types\GeometryType;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Doctrine POLYGON type
 */
class PolygonType extends GeometryType
{
    /**
     * {@inheritdoc}
     */
    public function getSQLType()
    {
        return GeometryInterface::POLYGON;
    }
}
