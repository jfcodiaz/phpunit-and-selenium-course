<?php
namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
use BASEURL;
use HOST;

class ConstantByXMLTest extends TestCase
{

    public function testConstant_by_PHPUnitXML()
    {
        $expectedBaseUrl = 'http://localhost:8000';
        $expectedHost = '127.0.0.1';
        $this->assertSame($expectedBaseUrl, \BASEURL);
        $this->assertSame($expectedHost, \HOST);
    }
}
