<?php

namespace Tests\selenium;

use Tests\Selenium\SeleniumTestCase;

class FrontendStuffTest extends SeleniumTestCase
{
    public function testCanSeeCorrectStringsOnMainPage()
    {
        $this->url('http:/www/slim');
        $this->assertStringContainsString('Add a new category', $this->getSource());
    }
}
