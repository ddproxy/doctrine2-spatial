<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Overlaps DQL function
 */
class Overlaps extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'Overlaps';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
