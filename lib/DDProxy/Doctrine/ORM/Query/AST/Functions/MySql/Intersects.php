<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Intersects DQL function
 */
class Intersects extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'Intersects';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
