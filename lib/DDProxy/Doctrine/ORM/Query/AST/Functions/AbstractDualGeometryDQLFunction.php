<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions;

/**
 * Abstract DQL function requiring 2 geometry parameters
 *
 * @see        AbstractSpatialDQLFunction
 * @deprecated No longer used by internal code and not recommended - will be removed soon
 */
abstract class AbstractDualGeometryDQLFunction extends AbstractSpatialDQLFunction
{
    /**
     * @var int
     */
    protected $minGeomExpr = 2;

    /**
     * @var int
     */
    protected $maxGeomExpr = 2;
}
