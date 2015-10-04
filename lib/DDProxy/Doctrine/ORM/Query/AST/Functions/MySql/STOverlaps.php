<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Overlaps DQL function
 */
class STOverlaps extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'ST_Overlaps';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
