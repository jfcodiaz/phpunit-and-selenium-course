<?php
namespace Tests\Selenium;

final class HelloTest extends SeleniumTestCase
{
    /**
     * @return void
     */
    public function testHola()
    {
        $message  = $this->goTo('http://www')
            ->getElementById('hello-word')
            ->getText();
        $this->assertSame('Hello World!', $message);
    }

}
