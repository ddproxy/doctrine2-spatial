<?php
namespace DDProxy\Doctrine\ORM\Query\AST\Functions;

use DDProxy\Spatial\Exception\UnsupportedPlatformException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

/**
 * Abstract spatial DQL function
 */
abstract class AbstractSpatialDQLFunction extends FunctionNode
{
    /**
     * @var string
     */
    protected $functionName;

    /**
     * @var array
     */
    protected $platforms = array();

    /**
     * @var Node[]
     */
    protected $geomExpr = array();

    /**
     * @var int
     */
    protected $minGeomExpr;

    /**
     * @var int
     */
    protected $maxGeomExpr;

    /**
     * @param Parser $parser
     */
    public function parse(Parser $parser)
    {
        $lexer = $parser->getLexer();

        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);

        $this->geomExpr[] = $parser->ArithmeticPrimary();

        while (count($this->geomExpr) < $this->minGeomExpr || (($this->maxGeomExpr === null || count($this->geomExpr) < $this->maxGeomExpr) && $lexer->lookahead['type'] != Lexer::T_CLOSE_PARENTHESIS)) {
            $parser->match(Lexer::T_COMMA);

            $this->geomExpr[] = $parser->ArithmeticPrimary();
        }

        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    /**
     * @param SqlWalker $sqlWalker
     *
     * @return string
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        $this->validatePlatform($sqlWalker->getConnection()->getDatabasePlatform());

        $result = sprintf(
            '%s(%s',
            $this->functionName,
            $this->geomExpr[0]->dispatch($sqlWalker)
        );

        for ($i = 1, $size = count($this->geomExpr); $i < $size; $i++) {
            $result .= ', ' . $this->geomExpr[$i]->dispatch($sqlWalker);
        }

        $result .= ')';

        return $result;
    }

    /**
     * @param AbstractPlatform $platform
     *
     * @throws UnsupportedPlatformException
     */
    protected function validatePlatform(AbstractPlatform $platform)
    {
        $platformName = $platform->getName();

        if (isset($this->platforms) && ! in_array($platformName, $this->platforms)) {
            throw UnsupportedPlatformException::unsupportedPlatform($platformName);
        }
    }
}
