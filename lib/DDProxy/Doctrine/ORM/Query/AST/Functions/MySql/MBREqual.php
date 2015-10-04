<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * MBREqual DQL function
 */
class MBREqual extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'MBREqual';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
