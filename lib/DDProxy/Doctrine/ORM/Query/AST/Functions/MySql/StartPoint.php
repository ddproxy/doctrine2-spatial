<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * StartPoint DQL function
 */
class StartPoint extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'StartPoint';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
