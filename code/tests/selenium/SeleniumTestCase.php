<?php
namespace Tests\Selenium;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverBy;
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

    public function goBack() : SeleniumTestCase {
        $this->getWebDriver()->navigate()->back();
        return $this;
    }

    public function goForward() : SeleniumTestCase { 
        $this->getWebDriver()->navigate()->forward();
        return $this;
    }

    public function refresh() : SeleniumTestCase {
        $this->getWebDriver()->navigate()->refresh();
        return $this;
    }


    public function getSource() : string
    {
        return $this->getWebDriver()->getPageSource();
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
