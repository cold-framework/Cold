<?php


namespace Tests\DependencyInjection\Fixtures;


class PrimitiveConstructorWithoutDefaultValueClass
{
    public function __construct(string $name)
    {
    }
}