<?php

class MDTableGeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testDeprecatedFunc()
    {
        $tbl = new \DocsMd\MDTableGenerator();
        $tbl->openTable();

        $deprecated = new \DocsMd\FunctionEntity();
        $deprecated->isDeprecated(true);
        $deprecated->setDeprecationMessage('Is deprecated');
        $deprecated->setName('myFunc');
        $deprecated->setReturnType('mixed');

        $this->assertTrue($deprecated->isDeprecated());

        $tbl->addFunc($deprecated);

        $tblMarkdown = $tbl->getTable();
        $expect = '| Visibility | Function |' . PHP_EOL .
            '|:-----------|:---------|' . PHP_EOL .
            '| public | <strike><strong>myFunc()</strong> : <em>mixed</em></strike><br /><em>DEPRECATED - Is deprecated</em> |';

        $this->assertEquals($expect, $tblMarkdown);
    }

    public function testFunc()
    {
        $tbl = new \DocsMd\MDTableGenerator();
        $tbl->openTable();

        $func = new \DocsMd\FunctionEntity();
        $func->setName('myFunc');
        $tbl->addFunc($func);

        $tblMarkdown = $tbl->getTable();
        $expect = '| Visibility | Function |' . PHP_EOL .
            '|:-----------|:---------|' . PHP_EOL .
            '| public | <strong>myFunc()</strong> : <em>void</em> |';

        $this->assertEquals($expect, $tblMarkdown);
    }

    public function testFuncWithAllFeatures()
    {
        $tbl = new \DocsMd\MDTableGenerator();
        $tbl->openTable();

        $func = new \DocsMd\FunctionEntity();

        $this->assertFalse($func->isStatic());
        $this->assertFalse($func->hasParams());
        $this->assertFalse($func->isDeprecated());
        $this->assertFalse($func->isAbstract());
        $this->assertEquals('public', $func->getVisibility());

        $func->isStatic(true);
        $func->setVisibility('protected');
        $func->setName('someFunc');
        $func->setDescription('desc...');
        $func->setReturnType('\\stdClass');

        $params = array();

        $paramA = new \DocsMd\ParamEntity();
        $paramA->setName('$var');
        $paramA->setType('mixed');
        $paramA->setDefault('null');
        $params[] = $paramA;

        $paramB = new \DocsMd\ParamEntity();
        $paramB->setName('$other');
        $paramB->setType('string');
        $paramB->setDefault("'test'");
        $params[] = $paramB;

        $func->setParams($params);

        $tbl->addFunc($func);

        $this->assertTrue($func->isStatic());
        $this->assertTrue($func->hasParams());
        $this->assertEquals('protected', $func->getVisibility());

        $tblMarkdown = $tbl->getTable();
        $expect = '| Visibility | Function |' . PHP_EOL .
            '|:-----------|:---------|' . PHP_EOL .
            '| protected static | <strong>someFunc(</strong><em>mixed</em> <strong>$var=null</strong>, <em>string</em> <strong>$other=\'test\'</strong>)</strong> : <em>\\stdClass</em><br /><em>desc...</em> |';

        $this->assertEquals($expect, $tblMarkdown);
    }

    public function testToggleDeclaringAbstraction()
    {
        $tbl = new \DocsMd\MDTableGenerator();
        $tbl->openTable();

        $func = new \DocsMd\FunctionEntity();
        $func->isAbstract(true);
        $func->setName('someFunc');

        $tbl->addFunc($func);
        $tblMarkdown = $tbl->getTable();
        $expect = '| Visibility | Function |' . PHP_EOL .
            '|:-----------|:---------|' . PHP_EOL .
            '| public | <strong>abstract someFunc()</strong> : <em>void</em> |';

        $this->assertEquals($expect, $tblMarkdown);

        $tbl->openTable();
        $tbl->doDeclareAbstraction(false);
        $tbl->addFunc($func);

        $tblMarkdown = $tbl->getTable();
        $expect = '| Visibility | Function |' . PHP_EOL .
            '|:-----------|:---------|' . PHP_EOL .
            '| public | <strong>someFunc()</strong> : <em>void</em> |';

        $this->assertEquals($expect, $tblMarkdown);
    }
}
