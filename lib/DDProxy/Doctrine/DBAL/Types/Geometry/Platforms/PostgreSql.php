<?php
namespace DDProxy\Doctrine\DBAL\Types\Geometry\Platforms;

use DDProxy\Doctrine\DBAL\Types\Platforms\AbstractPlatform;
use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * PostgreSql spatial platform
 */
class PostgreSql extends AbstractPlatform
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
        if ($fieldDeclaration['type']->getSQLType() == GeometryInterface::GEOMETRY) {
            return 'geometry';
        }

        return sprintf('geometry(%s)', $fieldDeclaration['type']->getSQLType());
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValueSQL($sqlExpr)
    {
        return sprintf('ST_AsEWKB(%s)', $sqlExpr);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValueSQL($sqlExpr)
    {
        return sprintf('ST_GeomFromEWKT(%s)', $sqlExpr);
    }

    /**
     * {@inheritdoc}
     */
    public function convertBinaryToPHPValue($sqlExpr)
    {
        if ( ! is_resource($sqlExpr)) {
            throw InvalidValueException::invalidType('resource', $sqlExpr);
        }

        $sqlExpr = stream_get_contents($sqlExpr);

        return parent::convertBinaryToPHPValue($sqlExpr);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue(GeometryInterface $value)
    {
        $sridSQL = null;

        if (($srid = $value->getSrid()) !== null) {
            $sridSQL = sprintf('SRID=%d;', $srid);
        }

        return sprintf(
            '%s%s(%s)',
            $sridSQL,
            strtoupper($value->getType()),
            $value
        );
    }
}
