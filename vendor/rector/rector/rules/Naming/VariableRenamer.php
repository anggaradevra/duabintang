<?php

declare (strict_types=1);
namespace Rector\Naming;

use PhpParser\Node;
use PhpParser\Node\Expr\ArrowFunction;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Function_;
use PhpParser\NodeTraverser;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\Naming\PhpDoc\VarTagValueNodeRenamer;
use Rector\NodeNameResolver\NodeNameResolver;
use Rector\PhpDocParser\NodeTraverser\SimpleCallableNodeTraverser;
final class VariableRenamer
{
    /**
     * @readonly
     * @var \Rector\PhpDocParser\NodeTraverser\SimpleCallableNodeTraverser
     */
    private $simpleCallableNodeTraverser;
    /**
     * @readonly
     * @var \Rector\NodeNameResolver\NodeNameResolver
     */
    private $nodeNameResolver;
    /**
     * @readonly
     * @var \Rector\Naming\PhpDoc\VarTagValueNodeRenamer
     */
    private $varTagValueNodeRenamer;
    /**
     * @readonly
     * @var \Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory
     */
    private $phpDocInfoFactory;
    public function __construct(SimpleCallableNodeTraverser $simpleCallableNodeTraverser, NodeNameResolver $nodeNameResolver, VarTagValueNodeRenamer $varTagValueNodeRenamer, PhpDocInfoFactory $phpDocInfoFactory)
    {
        $this->simpleCallableNodeTraverser = $simpleCallableNodeTraverser;
        $this->nodeNameResolver = $nodeNameResolver;
        $this->varTagValueNodeRenamer = $varTagValueNodeRenamer;
        $this->phpDocInfoFactory = $phpDocInfoFactory;
    }
    /**
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Stmt\Function_|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Expr\ArrowFunction $functionLike
     */
    public function renameVariableInFunctionLike($functionLike, string $oldName, string $expectedName, ?Assign $assign = null) : bool
    {
        $isRenamingActive = \false;
        if (!$assign instanceof Assign) {
            $isRenamingActive = \true;
        }
        $hasRenamed = \false;
        $currentStmt = null;
        $currentClosure = null;
        $this->simpleCallableNodeTraverser->traverseNodesWithCallable((array) $functionLike->getStmts(), function (Node $node) use($oldName, $expectedName, $assign, &$isRenamingActive, &$hasRenamed, &$currentStmt, &$currentClosure) {
            // skip param names
            if ($node instanceof Param) {
                return NodeTraverser::DONT_TRAVERSE_CURRENT_AND_CHILDREN;
            }
            if ($assign instanceof Assign && $node === $assign) {
                $isRenamingActive = \true;
                return null;
            }
            if ($node instanceof Stmt) {
                $currentStmt = $node;
            }
            if ($node instanceof Closure) {
                $currentClosure = $node;
            }
            if (!$node instanceof Variable) {
                return null;
            }
            // TODO: Should be implemented in BreakingVariableRenameGuard::shouldSkipParam()
            if ($this->isParamInParentFunction($node, $currentClosure)) {
                return null;
            }
            if (!$isRenamingActive) {
                return null;
            }
            $variable = $this->renameVariableIfMatchesName($node, $oldName, $expectedName, $currentStmt);
            if ($variable instanceof Variable) {
                $hasRenamed = \true;
            }
            return $variable;
        });
        return $hasRenamed;
    }
    private function isParamInParentFunction(Variable $variable, ?Closure $closure) : bool
    {
        if (!$closure instanceof Closure) {
            return \false;
        }
        $variableName = $this->nodeNameResolver->getName($variable);
        if ($variableName === null) {
            return \false;
        }
        foreach ($closure->params as $param) {
            if ($this->nodeNameResolver->isName($param, $variableName)) {
                return \true;
            }
        }
        return \false;
    }
    private function renameVariableIfMatchesName(Variable $variable, string $oldName, string $expectedName, ?Stmt $currentStmt) : ?Variable
    {
        if (!$this->nodeNameResolver->isName($variable, $oldName)) {
            return null;
        }
        $variable->name = $expectedName;
        $variablePhpDocInfo = $this->resolvePhpDocInfo($variable, $currentStmt);
        $this->varTagValueNodeRenamer->renameAssignVarTagVariableName($variablePhpDocInfo, $oldName, $expectedName);
        return $variable;
    }
    /**
     * Expression doc block has higher priority
     */
    private function resolvePhpDocInfo(Variable $variable, ?Stmt $currentStmt) : PhpDocInfo
    {
        if ($currentStmt instanceof Stmt) {
            return $this->phpDocInfoFactory->createFromNodeOrEmpty($currentStmt);
        }
        return $this->phpDocInfoFactory->createFromNodeOrEmpty($variable);
    }
}
