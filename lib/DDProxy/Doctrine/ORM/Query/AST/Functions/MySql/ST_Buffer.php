<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Description of ST_Intersects
 */
class ST_Buffer extends AbstractSpatialDQLFunction
{
	 protected $platforms = array('mysql');

    protected $functionName = 'ST_Buffer';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
