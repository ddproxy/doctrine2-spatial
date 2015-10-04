<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Disjoint DQL function
 */
class Disjoint extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'Disjoint';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
