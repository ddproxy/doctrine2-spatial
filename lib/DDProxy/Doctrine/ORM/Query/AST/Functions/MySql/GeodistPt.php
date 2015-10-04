<?php

namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * GeodistPt DQL function
 */
class GeodistPt extends AbstractSpatialDQLFunction
{
	protected $platforms = array('mysql');

    protected $functionName = 'geodist_pt';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
