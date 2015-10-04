<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * LineString DQL Function
 */
class LineString extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'LineString';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
