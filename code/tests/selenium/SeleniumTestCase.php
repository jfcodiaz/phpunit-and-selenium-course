<?php
namespace Tests\Selenium;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;
use PHPUnit\Framework\TestCase;

class SeleniumTestCase extends TestCase
{

    private $webDriver = null;

    public function getWebDriver() : RemoteWebDriver
    {
        if (null === $this->webDriver) {
            $serverUrl = 'http://selenium-hub:4444';
            $this->webDriver = RemoteWebDriver::create(
                $serverUrl,
                DesiredCapabilities::chrome()
            );
        }

        return $this->webDriver;
    }

    public function goTo(string $url) : SeleniumTestCase
    {
        $this->getWebDriver()->get($url);
        return $this;
    }

    public function url(string $url) : SeleniumTestCase
    {
        $this->goTo($url);
        return $this;
    }

    public function byCssSelector(string $cssSelector) : RemoteWebElement
    {
        return $this->getWebDriver()->findElement(
            WebDriverBy::cssSelector($cssSelector)
        );
    }

    public function getElementByCss($cssSelector) : RemoteWebElement
    {
        return $this->byCssSelector($cssSelector);
    }

    public function title() : string
    {
        return $this->webDriver->getTitle();
    }

    public function getElementById(string $id) : RemoteWebElement
    {
        return $this->getWebDriver()->findElement(WebDriverBy::id($id));
    }

    public function getElementByTagName($tagName) : RemoteWebElement
    {
        return $this->getWebDriver()->findElement(WebDriverBy::tagName($tagName));
    }

    public function goBack() : SeleniumTestCase
    {
        $this->getWebDriver()->navigate()->back();
        return $this;
    }

    public function goForward() : SeleniumTestCase
    {
        $this->getWebDriver()->navigate()->forward();
        return $this;
    }

    public function refresh() : SeleniumTestCase
    {
        $this->getWebDriver()->navigate()->refresh();
        return $this;
    }


    public function getSource() : string
    {
        return $this->getWebDriver()->getPageSource();
    }


    protected function selectOptionByLabel(
        string $cssSelector,
        string $label
    ) : SeleniumTestCase {
        $select = $this->getElementByCss($cssSelector);
        (new WebDriverSelect($select))->selectByVisibleText($label);
        return $this;
    }

    protected function getSelectedOption(string $cssSelector)
    {
        $select = $this->getElementByCss($cssSelector);
        return (new WebDriverSelect($select))->getFirstSelectedOption();
    }

    protected function selectByIndex(
        string $cssSelector,
        $index
    ) : SeleniumTestCase {
        $select = new WebDriverSelect($this->getElementByCss($cssSelector));
        $select->selectByIndex($index);
        return $this;
    }

    /**
     * @return <int, RemoteWebElement>
     */
    protected function getSelectedOptions(string $cssSelector) : array
    {
        $select = $this->getElementByCss($cssSelector);
        return (new WebDriverSelect($select))->getAllSelectedOptions();
    }

    protected function clearSelect(string $cssSelector) : SeleniumTestCase
    {
        $select = $this->getElementByCss($cssSelector);
        (new WebDriverSelect($select))->deselectAll();
        return $this;
    }

    protected function getElementByXPath($xpath) : RemoteWebElement
    {
        return $this->getWebDriver()->findElement(WebDriverBy::XPath($xpath));
    }

    protected function getElementByName($name) : RemoteWebElement
    {
        return $this->getWebDriver()->findElement(WebDriverBy::name($name));
    }

    protected function fillInput($cssSelector, $value) : SeleniumTestCase
    {
        $input = $this->getElementByCss($cssSelector);
        $input->sendKeys($value);
        return $this;
    }

    protected function getElementsByCss($cssSelector)
    {
        return $this->getWebDriver()
            ->findElements(WebDriverBy::cssSelector($cssSelector));
    }

    protected function clickOnElement($cssSelector) : SeleniumTestCase
    {
        $this->getElementByCss($cssSelector)->click();
        return $this;
    }

    protected function getLinkByText($text) : RemoteWebElement
    {
        $driver = $this->getWebDriver();
        return $driver->findElement(WebDriverBy::linkText($text));
    }

    protected function tearDown() : void
    {
        if (null !== $this->webDriver) {
            $this->webDriver->quit();
            $this->webDriver = null;
        }
    }

    public function __destruct()
    {
        $this->tearDown();
    }
}
