<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class DependenciesTest extends TestCase
{

    private $value;

    public function testFirstTest()
    {
        $this->value = 1;
        $this->assertEquals(1, $this->value);

        return $this->value;
    }

    /**
     * @depends testFirstTest
     */
    public function testDependency1($value)
    {
        $value++;
        $expeted = 2;
        $result = $value;
        $this->assertEquals($expeted, $result);

        return $value;
    }

     /**
     * @depends testDependency1
     */
    public function testDependency2($value)
    {
        $value++;
        $expeted = 3;
        $result = $value;
        $this->assertEquals($expeted, $result);
    }
}
