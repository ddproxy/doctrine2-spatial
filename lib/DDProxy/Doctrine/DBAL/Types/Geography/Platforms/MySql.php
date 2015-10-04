<?php
namespace DDProxy\Doctrine\DBAL\Types\Geography\Platforms;

use DDProxy\Spatial\PHP\Types\Geography\GeographyInterface;

/**
 * MySql spatial platform
 */
class MySql extends \DDProxy\Doctrine\DBAL\Types\Geometry\Platforms\MySql
{
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
            return 'GEOMETRY';
        }

        return parent::getSQLDeclaration($fieldDeclaration);
    }

}
