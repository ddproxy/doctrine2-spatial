<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_StartPoint DQL function
 */
class STStartPoint extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_StartPoint';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
