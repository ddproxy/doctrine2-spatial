<?php
namespace DDProxy\Doctrine\DBAL\Types\Geometry;

use DDProxy\Doctrine\DBAL\Types\GeometryType;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Doctrine LINESTRING type
 */
class LineStringType extends GeometryType
{
    /**
     * {@inheritdoc}
     */
    public function getSQLType()
    {
        return GeometryInterface::LINESTRING;
    }
}
