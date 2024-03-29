<?php

declare (strict_types=1);
namespace Rector\PHPUnit\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Type\ObjectType;
use Rector\Core\Rector\AbstractRector;
use Rector\PHPUnit\NodeAnalyzer\TestsNodeAnalyzer;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \Rector\PHPUnit\Tests\Rector\Class_\PreferPHPUnitThisCallRector\PreferPHPUnitThisCallRectorTest
 */
final class PreferPHPUnitThisCallRector extends AbstractRector
{
    /**
     * @readonly
     * @var \Rector\PHPUnit\NodeAnalyzer\TestsNodeAnalyzer
     */
    private $testsNodeAnalyzer;
    public function __construct(TestsNodeAnalyzer $testsNodeAnalyzer)
    {
        $this->testsNodeAnalyzer = $testsNodeAnalyzer;
    }
    public function getRuleDefinition() : RuleDefinition
    {
        return new RuleDefinition('Changes PHPUnit calls from self::assert*() to $this->assert*()', [new CodeSample(<<<'CODE_SAMPLE'
use PHPUnit\Framework\TestCase;

final class SomeClass extends TestCase
{
    public function run()
    {
        self::assertEquals('expected', $result);
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
use PHPUnit\Framework\TestCase;

final class SomeClass extends TestCase
{
    public function run()
    {
        $this->assertEquals('expected', $result);
    }
}
CODE_SAMPLE
)]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [Class_::class];
    }
    /**
     * @param Class_ $node
     */
    public function refactor(Node $node) : ?Node
    {
        if (!$this->testsNodeAnalyzer->isInTestClass($node)) {
            return null;
        }
        $hasChanged = \false;
        $this->traverseNodesWithCallable($node, function (Node $node) use(&$hasChanged) : ?MethodCall {
            if (!$node instanceof StaticCall) {
                return null;
            }
            $methodName = $this->getName($node->name);
            if (!\is_string($methodName)) {
                return null;
            }
            if (!$this->isNames($node->class, ['static', 'self'])) {
                return null;
            }
            if (!$this->isObjectType($node->class, new ObjectType('PHPUnit\\Framework\\TestCase'))) {
                return null;
            }
            if (!$this->isName($node->name, 'assert*')) {
                return null;
            }
            $hasChanged = \true;
            return $this->nodeFactory->createMethodCall('this', $methodName, $node->getArgs());
        });
        if ($hasChanged) {
            return $node;
        }
        return null;
    }
}
