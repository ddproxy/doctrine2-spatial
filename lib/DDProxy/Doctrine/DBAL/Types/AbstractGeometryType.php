<?php
namespace DDProxy\Doctrine\DBAL\Types;

use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\Exception\UnsupportedPlatformException;
use DDProxy\Doctrine\DBAL\Types\Platforms\PlatformInterface;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Abstract Doctrine GEOMETRY type
 */
abstract class AbstractGeometryType extends Type
{
    const PLATFORM_MYSQL = 'MySql';
    const PLATFORM_POSTGRESQL = 'PostgreSql';

    /**
     * @return string
     */
    abstract public function getTypeFamily();

    /**
     * Gets the SQL name of this type.
     *
     * @return string
     */
    abstract public function getSQLType();

    /**
     * {@inheritdoc}
     */
    public function canRequireSQLConversion()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return $value;
        }

        if ( ! ($value instanceof GeometryInterface)) {
            throw InvalidValueException::invalidValueNoGeometryInterface();
        }

        return $this->getSpatialPlatform($platform)->convertToDatabaseValue($value);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValueSQL($sqlExpr, $platform)
    {
        return $this->getSpatialPlatform($platform)->convertToPHPValueSQL($sqlExpr);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {
        return $this->getSpatialPlatform($platform)->convertToDatabaseValueSQL($sqlExpr);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }

        if (ctype_alpha($value[0])) {
            return $this->getSpatialPlatform($platform)->convertStringToPHPValue($value);
        }

        return $this->getSpatialPlatform($platform)->convertBinaryToPHPValue($value);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return array_search(get_class($this), $this->getTypesMap());
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $this->getSpatialPlatform($platform)->getSQLDeclaration($fieldDeclaration);
    }

    /**
     * {@inheritdoc}
     */
    public function getMappedDatabaseTypes(AbstractPlatform $platform)
    {
        return array(strtolower($this->getSQLType()));
    }

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        // TODO onSchemaColumnDefinition event listener?
        return true;
    }

    /**
     * @param AbstractPlatform $platform
     *
     * @return PlatformInterface
     * @throws UnsupportedPlatformException
     */
    private function getSpatialPlatform(AbstractPlatform $platform)
    {
        if ( ! class_exists($spatialPlatformClass = $this->getSpatialPlatformClass($platform))) {
            throw UnsupportedPlatformException::unsupportedPlatform($platform->getName());
        }

        return new $spatialPlatformClass;
    }

    /**
     * @param AbstractPlatform $platform
     *
     * @return string
     * @throws UnsupportedPlatformException
     */
    private function getPlatformName(AbstractPlatform $platform)
    {
        $name = __CLASS__ . '::PLATFORM_' . strtoupper($platform->getName());

        if ( ! defined($name)) {
            throw UnsupportedPlatformException::unsupportedPlatform($name);
        }

        return constant($name);
    }

    /**
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    private function getSpatialPlatformClass(AbstractPlatform $platform)
    {
        return sprintf('DDProxy\Doctrine\DBAL\Types\%s\Platforms\%s', $this->getTypeFamily(), $this->getPlatformName($platform));
    }
}
