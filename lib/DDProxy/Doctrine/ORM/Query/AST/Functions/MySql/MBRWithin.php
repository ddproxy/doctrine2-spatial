<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * MBRWithin DQL function
 */
class MBRWithin extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'MBRWithin';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
