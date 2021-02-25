<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UsefulAnnotationTest extends TestCase {
    private $value;

    /**
     * @before
     */
    public function runBeforeEachTestMethod()
    {
        $this->value = 1;
    }

    /**
     * @after
     */
    public function runAfterEachTestMethod()
    {
        unset($this->value);
        
    }

    public function testAnnotations1()
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($expected, $result);
    }
    
    public function testAnnotation2()
    {
        $this->value++;
        $expected = 2;
        $result = $this->value;
        $this->assertEquals($result, $expected);
    }


}