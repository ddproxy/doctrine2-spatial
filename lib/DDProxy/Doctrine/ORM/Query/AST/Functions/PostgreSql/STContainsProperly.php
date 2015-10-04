<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_ContainsProperly DQL function
 */
class STContainsProperly extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_ContainsProperly';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
