<?php


namespace Tests\DI\Fixtures;


class InterfaceConstructorClass
{
    public function __construct(BasicInterface $basic)
    {
    }
}