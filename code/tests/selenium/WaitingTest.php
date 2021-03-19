<?php

namespace Tests\selenium;

use Tests\Selenium\SeleniumTestCase;

class WaitingTest extends SeleniumTestCase
{
    public function testExplicitWait()
    {
        $this->url('http://www/form.php');

        $firstName = $this->getElementById('first-name');

        $this->getWebDriver()->wait(null, 4000)->until(function () use ($firstName) {
            return $firstName->getAttribute('value') === 'Adam';
        });

        $this->assertSame('Adam', $firstName->getAttribute('value'));
    }


}
