<?php

namespace ColdBolt\Tests;

class TestClass {
    private string $name;
    private array $tests;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Test[]
     */
    public function getTests(): array
    {
        return $this->tests;
    }

    /**
     * @param Test|Test[] $tests
     */
    public function addTests(Test|array $tests): void
    {
        if(!is_array($tests))
        {
            $tests = [$tests];
        }

        foreach ($tests as $test) {
            $this->tests[] = $test;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
}