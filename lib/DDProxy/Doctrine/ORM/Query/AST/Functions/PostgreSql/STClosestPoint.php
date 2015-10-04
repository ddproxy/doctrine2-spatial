<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_ClosestPoint DQL function
 */
class STClosestPoint extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_ClosestPoint';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
