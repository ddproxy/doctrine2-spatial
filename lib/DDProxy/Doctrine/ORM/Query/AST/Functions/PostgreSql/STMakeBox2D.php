<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_MakeBox2D DQL function
 */
class STMakeBox2D extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_MakeBox2D';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
