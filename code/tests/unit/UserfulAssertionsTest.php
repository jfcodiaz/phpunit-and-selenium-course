<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Exception;

final class UserfulAssertionsTest extends TestCase
{
    public function testAssertSame()
    {
        $expected = 'baz';
        $result = 'baz';
        $this->assertSame($expected, $result);
    }

    public function testAssertEquals()
    {
        $expected = 2;
        $result = 2;
        $this->assertEquals($expected, $result);
    }

    public function testAssertEmpty()
    {
        $this->assertEmpty([]);
    }

    public function testAssertNull()
    {
        $this->assertNull(null);
    }

    public function testAssertGreaterThan()
    {
        $expected = 2;
        $actual = 3;
        $this->assertGreaterThan($expected, $actual);
    }

    public function testAssertFalse()
    {
        $this->assertFalse(false);
    }

    public function testAssertTrue()
    {
        $this->assertTrue(true);
    }

    public function testAssertCount()
    {
        $this->assertCount(3, [1, 2, 4]);
    }

    public function testAssertContains()
    {
        $this->assertContains(2, [1, 2, 3]);
    }

    public function testAssertStringContainsString()
    {
        $searchFor = 'foo';
        $searchIn = 'baz foo';
        $this->assertStringContainsString($searchFor, $searchIn);
    }

    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf(Exception::class, new Exception);
    }

    public function testAssertArrayHasKey()
    {
        $this->assertArrayHasKey('bazf', ['bazf' => 'bar']);
    }

    public function testAssertDirectoryIsWritable()
    {
        $this->assertDirectoryIsWritable('/var/logs/');
    }

    public function testAssertFileIsWritable()
    {
        $this->assertFileIsWritable('/var/www/.phpunit.result.cache');
    }
}
