<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * MBRIntersects DQL function
 */
class MBRIntersects extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'MBRIntersects';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
