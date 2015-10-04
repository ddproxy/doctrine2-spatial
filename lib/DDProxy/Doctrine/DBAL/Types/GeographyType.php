<?php
namespace DDProxy\Doctrine\DBAL\Types;

use DDProxy\Spatial\PHP\Types\Geography\GeographyInterface;

/**
 * Doctrine GEOGRAPHY type
 */
class GeographyType extends AbstractGeometryType
{
    /**
     * {@inheritdoc}
     */
    public function getSQLType()
    {
        return GeographyInterface::GEOGRAPHY;
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeFamily()
    {
        return GeographyInterface::GEOGRAPHY;
    }
}
