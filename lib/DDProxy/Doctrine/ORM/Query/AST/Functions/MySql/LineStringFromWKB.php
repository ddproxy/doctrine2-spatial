<?php

namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * LineStringFromWKB DQL function
 */
class LineStringFromWKB extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'LineStringFromWKB';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
