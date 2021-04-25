<?php


namespace Tests\DependencyInjection\Fixtures;


class InterfaceConstructorClass
{
    public function __construct(BasicInterface $basic)
    {
    }
}