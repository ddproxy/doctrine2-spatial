<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * MBRContains DQL function
 */
class MBRContains extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'MBRContains';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
