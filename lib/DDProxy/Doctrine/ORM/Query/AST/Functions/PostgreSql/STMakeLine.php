<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_MakeLine DQL function
 * this is a limited version of ST_MakeLine, supporting only 2 points.
 * ST_MakeLine also supports sets and arrays of geometry
 */
class STMakeLine extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_MakeLine';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
