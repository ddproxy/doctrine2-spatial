<?php
namespace DDProxy\Doctrine\DBAL\Types;

use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Doctrine GEOMETRY type
 */
class GeometryType extends AbstractGeometryType
{
    /**
     * {@inheritdoc}
     */
    public function getSQLType()
    {
        return GeometryInterface::GEOMETRY;
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeFamily()
    {
        return GeometryInterface::GEOMETRY;
    }
}
