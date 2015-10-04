<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\PostgreSql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_CoveredBy DQL function
 */
class STCoveredBy extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_CoveredBy';

    protected $minGeomExpr = 2;

    protected $maxGeomExpr = 2;
}
