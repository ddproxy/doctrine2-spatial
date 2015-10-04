<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;
use DDProxy\Doctrine\ORM\Query\AST\Functions\ReturnsGeometryInterface;

/**
 * ST_AsText DQL function
 */
class STAsText extends AbstractSpatialDQLFunction implements ReturnsGeometryInterface
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_AsText';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
