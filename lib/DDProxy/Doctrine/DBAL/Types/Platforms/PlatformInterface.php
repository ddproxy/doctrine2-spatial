<?php
namespace DDProxy\Doctrine\DBAL\Types\Platforms;

use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Spatial platform interface
 */
interface PlatformInterface
{
    /**
     * @param string $sqlExpr
     *
     * @return GeometryInterface
     */
    public function convertBinaryToPHPValue($sqlExpr);

    /**
     * @param string $sqlExpr
     *
     * @return GeometryInterface
     */
    public function convertStringToPHPValue($sqlExpr);

    /**
     * @param GeometryInterface $value
     *
     * @return string
     */
    public function convertToDatabaseValue(GeometryInterface $value);

    /**
     * @param string $sqlExpr
     *
     * @return string
     */
    public function convertToDatabaseValueSQL($sqlExpr);

    /**
     * @param string $sqlExpr
     *
     * @return string
     */
    public function convertToPHPValueSQL($sqlExpr);

    /**
     * Get the type family for this interface (i.e. geometry or geography)
     *
     * @return string
     */
    public function getTypeFamily();

    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param array $fieldDeclaration
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration);
}
