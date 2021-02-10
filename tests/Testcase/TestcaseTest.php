<?php declare(strict_types=1);

namespace Tests\TestCase;

use ColdBolt\Tests\Test;
use ColdBolt\Tests\CommonTestCase;
use Tests\Testcase\Fixtures\BasicClass;

class TestcaseTest extends CommonTestCase
{
    #[Test]
    public function should_assert_array_has_key(): void
    {
        $arr = ["apple" => 10, "pear" => 8, "scoubidou" => 12];

        $this->assertArrayHasKey("apple", $arr);
    }

    #[Test]
    public function should_assert_class_has_attibute(): void
    {
        $this->assertClassHasAttribute('a', BasicClass::class);
    }

    #[Test]
    public function should_assert_class_has_static_attribute(): void
    {
        $this->assertClassHasStaticAttribute('b', BasicClass::class);
    }

    #[Test]
    public function should_assert_count(): void
    {
        $arr = [1, 2, 3, 4];

        $this->assertCount(4, $arr);
    }

    #[Test]
    public function should_assert_directory_exists(): void
    {
        $this->assertDirectoryExists('..');
    }

    #[Test]
    public function should_assert_directory_is_readable(): void
    {
        $this->assertDirectoryIsReadable('./readeable_folder');
    }

    #[Test]
    public function should_assert_directory_is_writable(): void
    {
        $this->assertDirectoryIsWritable('./writable_folder');
    }

    #[Test]
    public function should_assert_array_is_empty(): void
    {
        $this->assertEmpty([]);
    }

    #[Test]
    public function should_assert_equals(): void
    {
        $this->assertEquals("1", 1);
    }

    #[Test]
    public function should_assert_false(): void
    {
        $this->assertFalse(false);
    }

    #[Test]
    public function should_be_greater_than(): void
    {
        $this->assertGreaterThan(1, 2);
    }

    #[Test]
    public function should_be_greater_or_equal_than(): void
    {
        $this->assertGreaterThanOrEqual(1, 1);
        $this->assertGreaterThanOrEqual(1, 2);
    }

    #[Test]
    public function should_be_inifnite_number(): void
    {
        $this->assertInfinite(log(0));
    }

    #[Test]
    public function should_be_instance_of(): void
    {
        $this->assertInstanceOf(BasicClass::class, new BasicClass);
    }

    #[Test]
    public function should_be_array(): void
    {
        $this->assertIsArray([]);
    }

    #[Test]
    public function should_be_bool(): void
    {
        $this->assertIsBool(true);
    }

    #[Test]
    public function should_be_callable(): void
    {
        $this->assertIsCallable(function () {
            return null;
        });
    }

    #[Test]
    public function should_be_float(): void
    {
        $this->assertIsFloat(1.2);
    }

    #[Test]
    public function should_be_interger(): void
    {
        $this->assertIsInt(1);
    }

    #[Test]
    public function should_be_iterable(): void
    {
        $this->assertIsIterable([]);
    }

    #[Test]
    public function should_be_numeric(): void
    {
        $this->assertIsNumeric(1);
    }

    #[Test]
    public function should_be_object(): void
    {
        $this->assertIsObject(new BasicClass);
    }

    #[Test]
    public function should_be_resource(): void
    {
        $this->assertIsResource(STDOUT);
    }

    #[Test]
    public function should_be_scalar(): void
    {
        $this->assertIsScalar(true);
    }

    #[Test]
    public function should_be_string(): void
    {
        $this->assertIsString("Salut !");
    }

    #[Test]
    public function should_assert_it_is_readable(): void
    {
        $this->assertIsReadable(__DIR__ . "/Fixtures/readable_folder/readable_file");
    }

    #[Test]
    public function should_assert_it_is_writable(): void
    {
        $this->assertIsWritable(__DIR__ . "/Fixtures/writable_folder/writable_file");
    }

    #[Test]
    public function should_assert_less_than(): void
    {
        $this->assertLessThan(2, 1);
    }

    #[Test]
    public function should_assert_less_or_equals_than(): void
    {
        $this->assertLessThanOrEqual(2, 1);
        $this->assertLessThanOrEqual(2, 2);
    }

    #[Test]
    public function should_be_assert_it_is_nan(): void
    {
        $this->assertNan(NAN);
    }

    #[Test]
    public function should_assert_it_is_null(): void
    {
        $this->assertNull(null);
    }

    #[Test]
    public function should_be_assert_object_have_attr(): void
    {
        $basicClass = new BasicClass();
        $this->assertObjectHasAttribute('a', $basicClass);
    }

    #[Test]
    public function should_be_match_regex_expr(): void
    {
        $this->assertMatchesRegularExpression('/[a-z]*/', 'salut');
    }

    #[Test]
    public function should_be_same(): void
    {
        $this->assertSame(50, 50);
    }

    #[Test]
    public function should_be_true(): void
    {
        $this->assertTrue(true);
    }

    #[Test(canFail: true)]
    public function should_be_crash_but_can_be_fail(): void
    {
        $this->assertTrue(false, 'Failed to assert false is true');
    }
}
