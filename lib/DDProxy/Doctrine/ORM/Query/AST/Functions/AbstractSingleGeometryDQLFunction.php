<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions;

/**
 * Abstract DQL function requiring 1 geometry parameter
 *
 * @see        AbstractSpatialDQLFunction
 * @deprecated No longer used by internal code and not recommended - will be removed soon
 */
abstract class AbstractSingleGeometryDQLFunction extends AbstractSpatialDQLFunction
{
    /**
     * @var int
     */
    protected $minGeomExpr = 1;

    /**
     * @var int
     */
    protected $maxGeomExpr = 1;
}
