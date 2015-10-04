<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;
use DDProxy\Doctrine\ORM\Query\AST\Functions\ReturnsGeometryInterface;

/**
 * ST_Boundary DQL function
 */
class STBoundary extends AbstractSpatialDQLFunction implements ReturnsGeometryInterface
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Boundary';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
