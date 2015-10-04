<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * GeomFromText DQL function
 */
class GeomFromText extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'GeomFromText';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
