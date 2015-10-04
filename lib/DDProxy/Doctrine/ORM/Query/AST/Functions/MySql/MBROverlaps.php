<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * MBROverlaps DQL function
 */
class MBROverlaps extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'MBROverlaps';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
