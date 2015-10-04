<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Intersects DQL function
 */
class STIntersects extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'ST_Intersects';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
