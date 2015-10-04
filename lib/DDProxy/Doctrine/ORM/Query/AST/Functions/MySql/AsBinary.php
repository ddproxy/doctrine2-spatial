<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;
use DDProxy\Doctrine\ORM\Query\AST\Functions\ReturnsGeometryInterface;

/**
 * AsBinary DQL function
 */
class AsBinary extends AbstractSpatialDQLFunction implements ReturnsGeometryInterface
{
    protected $platforms = array('mysql');

    protected $functionName = 'AsBinary';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
