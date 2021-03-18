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

    /**
     * @return null|RemoteWebDriver
     */
    public function getWebDriver()
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

    /**
     * @param string $url
     *
     * @return $this
     */
    public function goTo($url)
    {
        $this->getWebDriver()->get($url);
        return $this;
    }

    /**
     * @param string $url
     * 
     * @return $this
     */
    public function url($url) {
        $this->goTo($url);
        return $this;
    }

    /**
     * @return string
     */
    public function title() {
        return $this->webDriver->getTitle();        
    }
    
    /**
     * @param int $id
     *
     * @return RemoteWebElement
     */
    public function getElementById($id)
    {
        return $this->getWebDriver()->findElement(WebDriverBy::id($id));
    }

    /**
     *  @return void
     */
    protected function tearDown(): void
    {
        if (null !== $this->webDriver) {
            $this->webDriver->quit();
            $this->webDriver = null;
        }
    }
}
