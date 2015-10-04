<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;
use DDProxy\Doctrine\ORM\Query\AST\Functions\ReturnsGeometryInterface;

/**
 * ST_AsGeoJSON DQL function
 */
class STAsGeoJson extends AbstractSpatialDQLFunction implements ReturnsGeometryInterface
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_AsGeoJson';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
