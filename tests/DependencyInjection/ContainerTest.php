<?php declare(strict_types=1);


namespace Tests\DependencyInjection;


use ColdBolt\Autoload\Container;
use ColdBolt\Tests\CommonTestCase;
use ColdBolt\Tests\Test;
use Tests\DependencyInjection\Fixtures\BasicInterface;
use Tests\DependencyInjection\Fixtures\EmptyConstructorClass;
use Tests\DependencyInjection\Fixtures\ImplementBasicInterfaceClass;
use Tests\DependencyInjection\Fixtures\InterfaceConstructorClass;
use Tests\DependencyInjection\Fixtures\PrimitiveConstructorClass;
use Tests\DependencyInjection\Fixtures\PrimitiveConstructorWithoutDefaultValueClass;

class ContainerTest extends CommonTestCase
{
    #[Test]
    public function container_can_resolve_class_with_empty_constructor(): void
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