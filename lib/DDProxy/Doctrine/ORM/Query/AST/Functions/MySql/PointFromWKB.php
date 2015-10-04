<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;
/**
 * PointFromWKB function
 */
class PointFromWKB extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'PointFromWKB';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
