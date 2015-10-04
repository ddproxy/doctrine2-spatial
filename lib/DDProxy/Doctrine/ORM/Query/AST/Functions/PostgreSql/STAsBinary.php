<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;
use DDProxy\Doctrine\ORM\Query\AST\Functions\ReturnsGeometryInterface;

/**
 * ST_AsBinary DQL function
 */
class STAsBinary extends AbstractSpatialDQLFunction implements ReturnsGeometryInterface
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_AsBinary';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
