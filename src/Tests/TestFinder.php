<?php

namespace ColdBolt\Tests;

use ColdBolt\Configuration;

class TestFinder
{
    private int $count = 0;

    public function __construct(
        public Configuration $config
    )
    {
    }

    /**
     * @return TestClass[]
     * @throws \ReflectionException
     */
    public function getTests(): array
    {
        $testClasses = $this->config->getTests();

        $tests = [];

        foreach ($testClasses as $testClass) {
            $reflectionClass = new \ReflectionClass($testClass);
            $methods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);

            $testsForThisClass = [];
            $before = [];
            $after = [];

            foreach ($methods as $method) {
                $attrs = $method->getAttributes();

                foreach ($attrs as $attr) {
                    if ($attr->getName() === Test::class) {
                        $test = (new \ReflectionClass(Test::class))->newInstanceArgs($attr->getArguments());
                        $test->setName($method->getName());
                        $testsForThisClass[] = $test;
                    }

                    if ($attr->getName() === Before::class) {
                        $before[] = (new \ReflectionClass(Before::class))->newInstanceArgs($attr->getArguments());
                    }

                    if ($attr->getName() === After::class) {
                        $after[] = (new \ReflectionClass(After::class))->newInstanceArgs($attr->getArguments());
                    }
                }
            }

            $testClass = new TestClass($testClass);

            /** @var $test Test */
            foreach ($testsForThisClass as $test) {
                foreach ($before as $obj) {
                    $test->addBefore($obj);
                }

                foreach ($after as $obj) {
                    $test->addAfter($obj);
                }

                $testClass->addTests($test);
            }

            $tests[] = $testClass;
        }

        return $tests;
    }
}
