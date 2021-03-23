<?php

namespace Tests\selenium;

use Facebook\WebDriver\WebDriverExpectedCondition;
use Tests\Selenium\SeleniumTestCase;

class FrontendStuffTest extends SeleniumTestCase
{
    public function testCanSeeCorrectStringsOnMainPage()
    {
        $this->url('http:/www/slim');
        $this->assertStringContainsString('Add a new category', $this->getSource());
    }

    public function testCanSeeConfirmDialogBoxWhenTryingToDeleteCategory()
    {
        $this->url('http:/www/slim');
        $driver = $this->getWebDriver();
        $this->clickOnElement('#delete-category-confirmation');
        $driver->wait()->until(function () {
            $alert = WebDriverExpectedCondition::alertIsPresent();
            return $alert !== null;
        });
        $driver->switchTo()->alert()->dismiss();
        $this->assertTrue(true);
    }

    public function testCanSeeCorrectMessageAfterDeletingCategory()
    {
        $this->url('http:/www/slim');
        $driver = $this->getWebDriver();
        $this->clickOnElement('#delete-category-confirmation');
        $driver->wait()->until(function () {
            $alert = WebDriverExpectedCondition::alertIsPresent();
            return $alert !== null;
        });
        $driver->switchTo()->alert()->accept();
        $this->assertStringContainsString('Category was deleted', $this->getSource());
        $this->markTestIncomplete('Message about deleted category should appear after redirection');
    }

}
