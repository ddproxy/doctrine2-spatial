<?php

namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Extent DQL function
 */
class STExtent extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Extent';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
