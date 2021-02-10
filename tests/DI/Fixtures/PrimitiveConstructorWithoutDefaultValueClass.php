<?php


namespace Tests\DI\Fixtures;


class PrimitiveConstructorWithoutDefaultValueClass
{
    public function __construct(string $name)
    {
    }
}