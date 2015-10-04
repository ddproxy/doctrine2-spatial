<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Within DQL function
 */
class Within extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'Within';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
