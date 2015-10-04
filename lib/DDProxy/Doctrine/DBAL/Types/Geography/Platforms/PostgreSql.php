<?php
namespace DDProxy\Doctrine\DBAL\Types\Geography\Platforms;

use DDProxy\Doctrine\DBAL\Types\Platforms\AbstractPlatform;
use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;
use DDProxy\Spatial\PHP\Types\Geography\GeographyInterface;

/**
 * PostgreSql spatial platform
 */
class PostgreSql extends AbstractPlatform
{
    const DEFAULT_SRID = 4326;

    /**
     * {@inheritdoc}
     */
    public function getTypeFamily()
    {
        return GeographyInterface::GEOGRAPHY;
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration)
    {
        if ($fieldDeclaration['type']->getSQLType() == GeographyInterface::GEOGRAPHY) {
            return 'geography';
        }

        if (isset($fieldDeclaration['srid'])) {
            return sprintf('geography(%s,%d)', $fieldDeclaration['type']->getSQLType(), $fieldDeclaration['srid']);
        }

        return sprintf('geography(%s)', $fieldDeclaration['type']->getSQLType());
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue(GeometryInterface $value)
    {
        if ( ! ($value instanceof GeographyInterface)) {
            throw InvalidValueException::invalidValueNotGeography();
        }

        if ($value->getSrid() === null) {
            $value->setSrid(self::DEFAULT_SRID);
        }

        return sprintf(
            'SRID=%d;%s(%s)',
            $value->getSrid(),
            strtoupper($value->getType()),
            $value
        );
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValueSQL($sqlExpr)
    {
        return sprintf('ST_AsEWKT(%s)', $sqlExpr);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValueSQL($sqlExpr)
    {
        return sprintf('ST_GeographyFromText(%s)', $sqlExpr);
    }
}
