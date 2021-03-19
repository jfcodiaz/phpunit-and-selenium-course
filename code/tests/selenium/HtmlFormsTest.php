<?php

namespace Tests\selenium;

use Tests\Selenium\SeleniumTestCase;
use Facebook\WebDriver\Cookie;

class HtmlFormsTest extends SeleniumTestCase
{
    public function testForms()
    {
        $this->url('http://www/form.php');
        $this->selectOptionByLabel('#option-element', 'Option 2');
        $this->assertSame(
            'option-2',
            $this->getSelectedOption('#option-element'
        )->getAttribute('value'));

        $this->selectByIndex('#option-element-m', 0);
        $this->selectByIndex('#option-element-m', 1);
        $this->clearSelect('#option-element-m');
        $this->assertCount(0, $this->getSelectedOptions('#option-element-m'));

        $this->selectByIndex('#option-element-m', 0);
        $this->selectByIndex('#option-element-m', 1);
        $this->assertCount(2, $this->getSelectedOptions('#option-element-m'));

        $this->fillInput('input[name="some_input_name"]', "Adam");
        $userNameInput = $this->getElementByName('some_input_name');
        $this->assertSame('Adam', $userNameInput->getAttribute('value'));

        $userNameInput->clear();
        $this->assertSame('', $userNameInput->getAttribute('value'));

        $this->fillInput('input[name="some_input_name"]', "Adam");
        $this->assertSame('Adam', $userNameInput->getAttribute('value'));

        $radios = $this->getElementsByCss('input[type="radio"]');
        $radios[0]->click();

        $checkbox = $this->getElementByCss('input[type="checkbox"]');
        $checkbox->click();

        $this->fillInput('textarea', 'Some text');

        $this->clickOnElement('#submit-button');

        $this->assertStringContainsString('The form was sent!', $this->getSource());

        $this->assertSame(
            $this->getElementByTagName('textarea')->getText(),
            '{"some_input_name":"Adam","radio":"on"}'
        );
    }


    public function testWriteReadCookies() : void
    {
        $this->url('http://www/form.php');

        $this->assertSame(
            '[]',
            $this->getElementById('div-cookies')->getText()
        );
        $this->getWebDriver()->manage()->addCookie(new Cookie('key', 'value'));

        $this->refresh();

        $cookie = $this->getWebDriver()->manage()->getCookieNamed('key');
        $this->assertEquals('value', $cookie->getValue());

        $this->assertSame(
            '{"key":"value"} key=value',
            $this->getElementById('div-cookies')->getText()
        );
    }
}
