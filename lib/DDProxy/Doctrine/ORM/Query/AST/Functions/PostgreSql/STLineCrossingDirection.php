<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_LineCrossingDirection DQL function
 */
class STLineCrossingDirection extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_LineCrossingDirection';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
