<?php

namespace Tests\selenium;

use Facebook\WebDriver\WebDriverBy;
use Tests\Selenium\SeleniumTestCase;

class FirstTest extends SeleniumTestCase
{

    public function setUp() : void
    {
        $this->url('http://www/elements.html');
    }

    public function testTitle() : void
    {
        $this->assertEquals('HTML by Adam Morse, mrmrs.cc', $this->title());
    }

    public function testGettingElements() : void
    {
        $h1 = $this->byCssSelector('header h1');
        $this->assertSame('HTML', $h1->getText());

        $arrH1 = (array) $this->getWebDriver()->findElements(WebDriverBy::cssSelector('h1'));
        $this->assertCount(16, $arrH1);
        $this->assertStringContainsString('Headings', $arrH1[2]->getText());

        $field = $this->getElementById('first-name');
        $this->assertSame('Adam', $field->getAttribute('value'));

        $link = $this->getElementById('google-link-id');
        $this->assertSame('Google', $link->getText());
        $link->click();
        $this->assertEquals('Google', $this->title());

        $this->goBack();

        $content = $this->getElementByTagName('body')->getText();
        $this->assertStringContainsString('Every html element in one place. Just waiting to be styled.', $content);

        $this->goForward();
        $this->assertEquals('Google', $this->title());
        $this->goBack();
        $this->refresh();
        $this->assertStringContainsString('At vero eos et accusamus', $this->getSource());
    }

}
