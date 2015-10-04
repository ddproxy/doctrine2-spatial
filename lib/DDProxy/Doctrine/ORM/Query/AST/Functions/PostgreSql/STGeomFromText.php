<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_GeomFromText DQL function
 */
class STGeomFromText extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_GeomFromText';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
