<?php

namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * DistanceFromMultyLine DQL function
 */
class DistanceFromMultyLine extends AbstractSpatialDQLFunction
{
	protected $platforms = array('mysql');

    protected $functionName = 'distance_from_multyline';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
