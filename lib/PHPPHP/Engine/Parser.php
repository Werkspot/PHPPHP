<?php

namespace PHPPHP\Engine;

use PhpParser\Lexer;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\Parser\Php7;

class Parser {

    protected $parser;
    protected $traverser;

    public function __construct() {
        $this->parser = new Php7(new Lexer());
        $this->traverser = new NodeTraverser();
        $this->traverser->addVisitor(new NameResolver());
    }

    public function parse($code) {
        $ast = $this->parser->parse($code);
        $ast = $this->traverser->traverse($ast);
        return $ast;
    }

}
