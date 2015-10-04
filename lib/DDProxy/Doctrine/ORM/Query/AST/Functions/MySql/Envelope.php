<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions\MySql;

use DDProxy\Doctrine\ORM\Query\AST\Functions\AbstractSpatialDQLFunction;

/**
 * Envelope DQL function
 */
class Envelope extends AbstractSpatialDQLFunction
{
    protected $platforms = array('mysql');

    protected $functionName = 'Envelope';

    protected $minGeomExpr = 1;

    protected $maxGeomExpr = 1;
}
