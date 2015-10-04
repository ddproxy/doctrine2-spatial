<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Point DQL Function
 */
class Point extends AbstractSpatialDQLFunction
{
	protected $platforms = array('mysql');

    protected $functionName = 'Point';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
