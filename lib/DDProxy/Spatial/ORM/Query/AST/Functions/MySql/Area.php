<?php
namespace DDProxy\Spatial\ORM\Query\AST\Functions\MySql;

use DDProxy\Spatial\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Area DQL function
 *
 * @author  Derek J. Lambert <dlambert@dereklambert.com>
 * @license http://dlambert.mit-license.org MIT
 */
class Area extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'ST_Area';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
