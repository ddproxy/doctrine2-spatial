<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * GPerimeter DQL function
 */
class ST_Perimeter extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Perimeter';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
