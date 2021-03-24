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
        $this->url('http:/www/slim/show-category/1');
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
        $this->url('http:/www/slim/show-category/1');
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

    public function testCanSeeEditAndDeleteLinksAndCategoryName()
    {
        $this->url('http:/www/slim');
        $electronics = $this->getLinkByText('Electronics');
        $electronics->click();

        $h5 = $this->getElementByCss('div.basic-card-content h5');
        $this->assertStringContainsString('Electronics', $h5->getText());

        $editLink = $this->getLinkByText('Edit');
        $href = $editLink->getAttribute('href');
        $this->assertStringContainsString('edit-category/1', $href);

        $this->markTestIncomplete('Category name, description, edit, delete links must be dynamic');
    }

    public function testCanSeeEditCategoryMessage()
    {
        $this->url('http:/www/slim/show-category/1');
        $editLink = $this->getLinkByText('Edit');
        $editLink->click();
        $this->assertStringContainsString('Edit category', $this->getSource());

        $this->markTestIncomplete('Make input values dynamic');
    }

    public function testCanSeeFormValidation()
    {
        $this->url('http:/www/slim');
        $button = $this->getElementByCss('input[type="submit"]');
        $button->click();
        $this->assertStringContainsString('Fill correctly the form', $this->getSource());

        $this->goBack();
        $categoryName = $this->getElementByName('category_name');
        $categoryName->sendKeys('Name');
        $categoryDescription = $this->getElementByName('category_description');
        $categoryDescription->sendKeys('Description');
        $button = $this->getElementByCss('input[type="submit"]');
        $button->click();
        $this->assertStringContainsString('Category was saved', $this->getSource());
        $this->markTestIncomplete('More jobs with html form needed');
    }

    public function testCanSeeNestedCategories()
    {
        $this->url('http:/www/slim');
        $categories = $this->getElementsByCss('ul.dropdown li');
        $this->assertEquals(18, count($categories));

        $elem1 = $this->getElementByCss('ul.dropdown > li:nth-child(2) > a');
        $this->assertStringContainsString('Electronics', $elem1->getText());

        $elem2 = $this->getElementByCss('ul.dropdown > li:nth-child(3) > a');
        $this->assertStringContainsString('Videos', $elem2->getText());

        $elem3 = $this->getElementByCss('ul.dropdown > li:nth-child(4) > a');
        $this->assertStringContainsString('Software', $elem3->getText());

        // $elem4 = $this->getElementByCss('ul.dropdown > :nth-child(2) > :nth-child(2) > :nth-child(1) > a');
        $elem4 = $this->getElementByXPath('//ul[@class="dropdown menu"]/li[2]/ul[1]/li[1]/a');
        $href = $elem4->getAttribute('href');

        $this->assertMatchesRegularExpression('@^http://www/slim/show-category/[0-9]+,Monitors$@', $href);

        $elem5 = $this->getElementByXPath('//ul[@class="dropdown menu"]/li[2]//ul[1]//ul[1]//ul[1]//ul[1]/li[1]/a');
        $href = $elem5->getAttribute('href');
        $this->assertMatchesRegularExpression('@^http://www/slim/show-category/[0-9]+,FullHD@', $href);
    }

}
