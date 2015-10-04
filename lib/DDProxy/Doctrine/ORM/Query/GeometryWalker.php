<?php
namespace DDProxy\Doctrine\ORM\Query;

use DDProxy\Doctrine\ORM\Query\AST\Functions\ReturnsGeometryInterface;
use Doctrine\ORM\Query\AST\SelectExpression;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\SqlWalker;

/**
 * GeometryWalker
 *
 * Custom DQL AST walker to return geometry objects from queries instead of strings.
 */
class GeometryWalker extends SqlWalker
{
    /**
     * @var ResultSetMapping
     */
    protected $rsm;

    /**
     * {@inheritDoc}
     */
    public function __construct($query, $parserResult, array $queryComponents)
    {
        $this->rsm = $parserResult->getResultSetMapping();

        parent::__construct($query, $parserResult, $queryComponents);
    }

    /**
     * Walks down a SelectExpression AST node and generates the corresponding SQL.
     *
     * @param SelectExpression $selectExpression
     *
     * @return string The SQL.
     */
    public function walkSelectExpression($selectExpression)
    {
        $expr = $selectExpression->expression;
        $sql  = parent::walkSelectExpression($selectExpression);

        if ($expr instanceof ReturnsGeometryInterface && !$selectExpression->hiddenAliasResultVariable) {
            $alias = trim(strrchr($sql, ' '));
            $this->rsm->typeMappings[$alias] = 'geometry';
        }

        return $sql;
    }
}
