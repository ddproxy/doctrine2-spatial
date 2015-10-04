<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Distance_Sphere DQL function
 */
class STDistanceSphere extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Distance_Sphere';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 3;
}
