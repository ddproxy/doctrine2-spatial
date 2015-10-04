<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * GLength DQL function
 */
class GLength extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'GLength';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
