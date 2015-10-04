<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Crosses DQL function
 */
class STCrosses extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_Crosses';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
