<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Description of ST_Intersects
 */
class ST_Intersects extends AbstractSpatialDQLFunction
{
	 protected $platforms = array('mysql');

    protected $functionName = 'ST_Intersects';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
