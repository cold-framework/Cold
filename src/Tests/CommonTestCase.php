<?php

namespace ColdBolt\Tests;

use ReflectionObject;


use ColdBolt\Exception\NotImplementedYetException;


use ColdBolt\Tests\Error\NaNError;
use ColdBolt\Tests\Error\CountError;
use ColdBolt\Tests\Error\NotLessError;
use ColdBolt\Tests\Error\NotNullError;
use ColdBolt\Tests\Error\NotSameError;
use ColdBolt\Tests\Error\NotTrueError;
use ColdBolt\Tests\Error\TypeIntError;
use ColdBolt\Tests\Error\NotEmptyError;
use ColdBolt\Tests\Error\NotFalseError;
use ColdBolt\Tests\Error\TypeBoolError;
use ColdBolt\Tests\Error\NotEqualsError;
use ColdBolt\Tests\Error\TypeArrayError;
use ColdBolt\Tests\Error\TypeFloatError;
use ColdBolt\Tests\Error\NotReadbleError;
use ColdBolt\Tests\Error\TypeObjectError;
use ColdBolt\Tests\Error\TypeScalarError;
use ColdBolt\Tests\Error\TypeStringError;
use ColdBolt\Tests\Error\GreaterThanError;
use ColdBolt\Tests\Error\NotWritableError;
use ColdBolt\Tests\Error\TypeNumericError;
use ColdBolt\Tests\Error\TypeCallableError;
use ColdBolt\Tests\Error\TypeIterableError;
use ColdBolt\Tests\Error\TypeResourceError;
use ColdBolt\Tests\Error\NotInstanceOfError;
use ColdBolt\Tests\Error\ArrayHasNotKeyError;
use ColdBolt\Tests\Error\NotLessOrEqualsError;
use ColdBolt\Tests\Error\NotInfiniteNumberError;
use ColdBolt\Tests\Error\GreaterOrEqualThanError;
use ColdBolt\Tests\Error\DirectoryNotReadbleError;
use ColdBolt\Tests\Error\ClassHasNotAttributeError;
use ColdBolt\Tests\Error\DirectoryDoNotExistsError;
use ColdBolt\Tests\Error\DirectoryNotWritableError;
use ColdBolt\Tests\Error\ObjectHasNotAttributeError;
use ColdBolt\Tests\Error\RegularExpressionDoesNotMatch;
use ColdBolt\Tests\Error\ClassHasNotStaticAttributeError;

abstract class CommonTestCase
{
    protected function assertArrayHasKey($key, array $array, ?string $message = null): void
    {
        if (!isset($array[$key])) {
            throw new ArrayHasNotKeyError($message);
        }
    }
    protected function assertClassHasAttribute(string $attributeName, string $className, ?string $message = null): void
    {
        $reflectionClass = new \ReflectionClass($className);
        $attributes = $reflectionClass->getProperties();

        foreach ($attributes as $attribute) {
            if ($attribute->getName() === $attributeName) {
                return;
            }
        }

        throw new ClassHasNotAttributeError($message);
    }
    protected function assertClassHasStaticAttribute(string $attributeName, string $className, ?string $message = null): void
    {
        $reflectionClass = new \ReflectionClass($className);
        $attributes = $reflectionClass->getProperties(\ReflectionProperty::IS_STATIC);

        foreach ($attributes as $attribute) {
            if ($attribute->getName() === $attributeName) {
                return;
            }
        }

        throw new ClassHasNotStaticAttributeError($message);
    }
    protected function assertContains($needle, iterable $haystack, ?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertStringContainsString(string $needle, string $haystack, ?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertStringContainsStringIgnoringCase(string $needle, string $haystack, ?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertContainsOnly(string $type, iterable $haystack, ?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertContainsOnlyInstancesOf(string $classname, array $haystack, ?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertCount(int $expectedCount, array $haystack, ?string $message = null): void
    {
        if (count($haystack) !== $expectedCount) {
            throw new CountError($message);
        }
    }
    protected function assertDirectoryExists(string $directory, ?string $message = null): void
    {
        if (!is_dir($directory)) {
            throw new DirectoryDoNotExistsError($message);
        }
    }
    protected function assertDirectoryIsReadable(string $directory, ?string $message = null): void
    {
        if (!is_readable((dirname($directory)))) {
            throw new DirectoryNotReadbleError($message);
        }
    }
    protected function assertDirectoryIsWritable(string $directory, ?string $message = null): void
    {
        if (!is_writable((dirname($directory)))) {
            throw new DirectoryNotWritableError($message);
        }
    }
    protected function assertEmpty($actual, ?string $message = null): void
    {
        if (!empty($actual)) {
            throw new NotEmptyError($message);
        }
    }

    protected function assertEquals($expected, $actual, ?string $message = null)
    {
        if ($expected != $actual) {
            throw new NotEqualsError($message);
        }
    }
    
    protected function assertEqualsCanonicalizing(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertEqualsIgnoringCase(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertEqualsWithDelta(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertObjectEquals(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }

    protected function assertFalse(bool $condition, ?string $message = null)
    {
        if ($condition) {
            throw new NotFalseError($message);
        }
    }
    protected function assertFileEquals(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertFileExists(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertFileIsReadable(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertFileIsWritable(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertGreaterThan($expected, $actual, ?string $message = null): void
    {
        if (!($actual > $expected)) {
            throw new GreaterThanError($message);
        }
    }
    protected function assertGreaterThanOrEqual($expected, $actual, ?string $message = null): void
    {
        if (!($actual >= $expected)) {
            throw new GreaterOrEqualThanError($message);
        }
    }
    protected function assertInfinite($variable, ?string $message = null): void
    {
        if (!is_infinite($variable)) {
            throw new NotInfiniteNumberError($message);
        }
    }
    protected function assertInstanceOf($expected, $actual, ?string $message = null): void
    {
        if (!($actual instanceof $expected)) {
            throw new NotInstanceOfError($message);
        }
    }
    protected function assertIsArray($actual, ?string $message = null): void
    {
        if (!is_array($actual)) {
            throw new TypeArrayError($message);
        }
    }
    protected function assertIsBool($actual, ?string $message = null): void
    {
        if (!is_bool($actual)) {
            throw new TypeBoolError($message);
        }
    }
    protected function assertIsCallable($actual, ?string $message = null): void
    {
        if (!is_callable($actual)) {
            throw new TypeCallableError($message);
        }
    }
    protected function assertIsFloat($actual, ?string $message = null): void
    {
        if (!is_float($actual)) {
            throw new TypeFloatError($message);
        }
    }
    protected function assertIsInt($actual, ?string $message = null): void
    {
        if (!is_int($actual)) {
            throw new TypeIntError($message);
        }
    }
    protected function assertIsIterable($actual, ?string $message = null): void
    {
        if (!is_iterable($actual)) {
            throw new TypeIterableError($message);
        }
    }
    protected function assertIsNumeric($actual, ?string $message = null): void
    {
        if (!is_numeric($actual)) {
            throw new TypeNumericError($message);
        }
    }
    protected function assertIsObject($actual, ?string $message = null): void
    {
        if (!is_object($actual)) {
            throw new TypeObjectError($message);
        }
    }
    protected function assertIsResource($actual, ?string $message = null): void
    {
        if (!is_resource($actual)) {
            throw new TypeResourceError($message);
        }
    }
    protected function assertIsScalar($actual, ?string $message = null): void
    {
        if (!is_scalar($actual)) {
            throw new TypeScalarError($message);
        }
    }
    protected function assertIsString($actual, ?string $message = null): void
    {
        if (!is_string($actual)) {
            throw new TypeStringError($message);
        }
    }
    protected function assertIsReadable($actual, ?string $message = null): void
    {
        if (!is_readable($actual)) {
            throw new NotReadbleError($message);
        }
    }
    protected function assertIsWritable($actual, ?string $message = null): void
    {
        if (!is_writable($actual)) {
            throw new NotWritableError($message);
        }
    }
    protected function assertJsonFileEqualsJsonFile(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertJsonStringEqualsJsonFile(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertJsonStringEqualsJsonString(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertLessThan($expected, $actual, ?string $message = null): void
    {
        if (!($actual < $expected)) {
            throw new NotLessError($message);
        }
    }
    protected function assertLessThanOrEqual($expected, $actual, ?string $message = null): void
    {
        if (!($actual <= $expected)) {
            throw new NotLessOrEqualsError($message);
        }
    }
    protected function assertNan($variable, ?string $message = null): void
    {
        if (!is_nan($variable)) {
            throw new NaNError($message);
        }
    }
    protected function assertNull($variable, ?string $message = null): void
    {
        if (!is_null($variable)) {
            throw new NotNullError($message);
        }
    }
    protected function assertObjectHasAttribute(string $attributeName, object $object, ?string $message = null): void
    {
        $reflectionObj = new ReflectionObject($object);
        $properties = $reflectionObj->getProperties();

        foreach ($properties as $property) {
            if ($property->getName() === $attributeName) {
                return;
            }
        }

        throw new ObjectHasNotAttributeError($message);
    }
    protected function assertMatchesRegularExpression(string $pattern, string $string, ?string $message = null): void
    {
        if (preg_match($pattern, $string) != 1) {
            throw new RegularExpressionDoesNotMatch($message);
        }
    }
    protected function assertSame($expected, $actual, ?string $message = null): void
    {
        if ($expected !== $actual) {
            throw new NotSameError($message);
        }
    }
    protected function assertStringEndsWith(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertStringEqualsFile(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertStringStartsWith(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    protected function assertThat(?string $message = null): void
    {
        throw new NotImplementedYetException;
    }
    
    protected function assertTrue($variable, ?string $message = null): void
    {
        if (!$variable) {
            throw new NotTrueError($message);
        }
    }
}
