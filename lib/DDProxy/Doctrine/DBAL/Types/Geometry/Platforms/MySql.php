<?php
namespace DDProxy\Doctrine\DBAL\Types\Geometry\Platforms;

use DDProxy\Doctrine\DBAL\Types\Platforms\AbstractPlatform;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * MySql spatial platform
 */
class MySql extends AbstractPlatform
{
    /**
     * {@inheritdoc}
     */
    public function getTypeFamily()
    {
        return GeometryInterface::GEOMETRY;
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration)
    {
        return strtoupper($fieldDeclaration['type']->getSQLType());
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValueSQL($sqlExpr)
    {
        return sprintf('AsBinary(%s)', $sqlExpr);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValueSQL($sqlExpr)
    {
        return sprintf('GeomFromText(%s)', $sqlExpr);
    }
}
