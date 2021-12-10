<?php

declare (strict_types=1);
namespace RectorPrefix20211210\Symplify\SimplePhpDocParser\PhpDocNodeVisitor;

use PHPStan\PhpDocParser\Ast\Node;
final class CallablePhpDocNodeVisitor extends \RectorPrefix20211210\Symplify\SimplePhpDocParser\PhpDocNodeVisitor\AbstractPhpDocNodeVisitor
{
    /**
     * @var callable
     */
    private $callable;
    /**
     * @var string|null
     */
    private $docContent;
    public function __construct(callable $callable, ?string $docContent)
    {
        $this->docContent = $docContent;
        $this->callable = $callable;
    }
    /**
     * @return int|Node|null
     * @param \PHPStan\PhpDocParser\Ast\Node $node
     */
    public function enterNode($node)
    {
        $callable = $this->callable;
        return $callable($node, $this->docContent);
    }
}
