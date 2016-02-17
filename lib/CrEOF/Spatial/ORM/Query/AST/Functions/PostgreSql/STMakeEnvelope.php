<?php

namespace CrEOF\Spatial\ORM\Query\AST\Functions\PostgreSql;

use CrEOF\Spatial\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * ST_MakeEnvelope DQL function
 * this is a limited version of ST_MakeEnvelope, supporting only 2 points.
 * ST_MakeEnvelope also supports sets and arrays of geometry
 *
 * @license http://dlambert.mit-license.org MIT
 */
class STMakeEnvelope extends AbstractSpatialDQLFunction
{
    protected $platforms = array('postgresql');

    protected $functionName = 'ST_MakeEnvelope';

    protected $minGeomExpr = 4;

    protected $maxGeomExpr = 5;
}
