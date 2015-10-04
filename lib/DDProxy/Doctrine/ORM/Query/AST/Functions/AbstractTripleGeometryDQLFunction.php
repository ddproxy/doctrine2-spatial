<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions;

/**
 * Abstract DQL function requiring 3 parameters
 */
abstract class AbstractTripleGeometryDQLFunction extends AbstractSpatialDQLFunction
{
    /**
     * @var int
     */
    protected $minGeomExpr = 3;

    /**
     * @var int
     */
    protected $maxGeomExpr = 3;
}
