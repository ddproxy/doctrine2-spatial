<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_Disjoint DQL function
 */
class STDisjoint extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'ST_Disjoint';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
