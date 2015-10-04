<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions;

/**
 * Abstract DQL function with variable geometry parameters
 *
 * @see        AbstractSpatialDQLFunction
 * @deprecated No longer used by internal code and not recommended - will be removed soon
 */
abstract class AbstractVariableGeometryDQLFunction extends AbstractSpatialDQLFunction
{
    /**
     * @var int
     */
    protected $minGeomExpr = 1;

    /**
     * @var int
     */
    protected $maxGeomExpr = null;
}
