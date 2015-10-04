<?php
namespace DDProxy\Doctrine\DBAL\Types\Geometry;

use DDProxy\Doctrine\DBAL\Types\GeometryType;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Doctrine POINT type
 */
class PointType extends GeometryType
{
    /**
     * {@inheritdoc}
     */
    public function getSQLType()
    {
        return GeometryInterface::POINT;
    }
}
