<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * MBRTouches DQL function
 */
class MBRTouches extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'MBRTouches';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
