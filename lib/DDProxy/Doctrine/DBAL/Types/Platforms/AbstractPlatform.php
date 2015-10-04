<?php
namespace DDProxy\Doctrine\DBAL\Types\Platforms;

use DDProxy\Doctrine\DBAL\Types\StringParser;
use DDProxy\Doctrine\DBAL\Types\BinaryParser;
use DDProxy\Spatial\Exception\InvalidValueException;
use DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface;

/**
 * Abstract spatial platform
 */
abstract class AbstractPlatform implements PlatformInterface
{
    /**
     * {@inheritdoc}
     */
    public function convertStringToPHPValue($sqlExpr)
    {
        $parser = new StringParser($sqlExpr);

        return $this->newObjectFromValue($parser->parse());
    }

    /**
     * {@inheritdoc}
     */
    public function convertBinaryToPHPValue($sqlExpr)
    {
        $parser = new BinaryParser($sqlExpr);

        return $this->newObjectFromValue($parser->parse());
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue(GeometryInterface $value)
    {
        return sprintf('%s(%s)', strtoupper($value->getType()), $value);
    }

    /**
     * Create spatial object from parsed value
     *
     * @param array $value
     *
     * @return GeometryInterface
     * @throws \DDProxy\Spatial\Exception\InvalidValueException
     */
    private function newObjectFromValue($value)
    {
        $constName = 'DDProxy\Spatial\PHP\Types\Geometry\GeometryInterface::' . strtoupper($value['type']);

        if ( ! defined($constName)) {
            throw InvalidValueException::unsupportedType($this->getTypeFamily(), strtoupper($value['type']));
        }

        $class = sprintf('DDProxy\Spatial\PHP\Types\%s\%s', $this->getTypeFamily(), constant($constName));

        return new $class($value['value'], $value['srid']);
    }
}
