<?php
namespace DDProxy\Doctrine\DBAL\Types\Geography;

use DDProxy\Doctrine\DBAL\Types\GeographyType;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Doctrine LINESTRING type
 */
class LineStringType extends GeographyType
{
    /**
     * {@inheritdoc}
     */
    public function getSQLType()
    {
        return GeometryInterface::LINESTRING;
    }
}
