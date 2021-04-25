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
        $testClasses = $this->config->get('test');

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
                    switch ($attr->getName()) {
                        case Test::class:
                            try {
                                $test = (new \ReflectionClass(Test::class))->newInstanceArgs($attr->getArguments());
                                $test->setName($method->getName());
                                $testsForThisClass[] = $test;
                            } catch (\ReflectionException) {

                            }
                            break;
                        case Before::class:
                            try {
                                $before[] = (new \ReflectionClass(Before::class))->newInstanceArgs($attr->getArguments());
                            } catch (\ReflectionException) {

                            }
                            break;
                        case After::class:
                            try {
                                $after[] = (new \ReflectionClass(After::class))->newInstanceArgs($attr->getArguments());
                            } catch (\ReflectionException) {

                            }
                            break;
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
