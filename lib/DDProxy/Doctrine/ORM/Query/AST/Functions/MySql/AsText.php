<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;
use DDProxy\Doctrine\ORM\Query\AST\Functions\ReturnsGeometryInterface;

/**
 * AsText DQL function
 */
class AsText extends AbstractSpatialDQLFunction implements ReturnsGeometryInterface
{
    protected $platforms = array('mysql');

    protected $functionName = 'AsText';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
