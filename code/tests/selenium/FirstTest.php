<?php 

namespace Tests\selenium;

use PHPUnit\Extensions\Selenium2TestCase;
use Tests\Selenium\SeleniumTestCase;

class FirstTest extends SeleniumTestCase{

    public function testTitle()
    {
        $this->url('http://google.com');
        $this->assertEquals('Google', $this->title());
    }

}