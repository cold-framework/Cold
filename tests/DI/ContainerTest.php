<?php declare(strict_types=1);


namespace Tests\DI;


use ColdBolt\Autoload\Container;
use ColdBolt\Tests\CommonTestCase;
use ColdBolt\Tests\Test;
use Tests\DI\Fixtures\BasicInterface;
use Tests\DI\Fixtures\EmptyConstructorClass;
use Tests\DI\Fixtures\ImplementBasicInterfaceClass;
use Tests\DI\Fixtures\InterfaceConstructorClass;
use Tests\DI\Fixtures\PrimitiveConstructorClass;
use Tests\DI\Fixtures\PrimitiveConstructorWithoutDefaultValueClass;

class ContainerTest extends CommonTestCase
{
    #[Test]
    public function container_can_resolve_class_with_empty_contructor(): void
    {
        $container = new Container;
        $instance = $container->resolve(EmptyConstructorClass::class);

        $this->assertInstanceOf(EmptyConstructorClass::class, $instance);
    }

    #[Test]
    public function container_can_resolve_class_with_primitive_argument(): void
    {
        $container = new Container;
        $instance = $container->resolve(PrimitiveConstructorClass::class);

        $this->assertInstanceOf(PrimitiveConstructorClass::class, $instance);
    }

    #[Test]
    public function container_can_not_resolve_class_with_primitive_argument_and_not_default_value(): void
    {
        $container = new Container;
        $instance = $container->resolve(PrimitiveConstructorWithoutDefaultValueClass::class);

        $this->assertNull($instance);
    }

    #[Test]
    public function container_can_resolve_class_with_interface_argument(): void
    {
        $container = new Container;
        $container->set(BasicInterface::class, function () {
            return new ImplementBasicInterfaceClass();
        });
        $instance = $container->resolve(InterfaceConstructorClass::class);

        $this->assertInstanceOf(InterfaceConstructorClass::class, $instance);
    }
}