<?php
namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
use App\forTestingAbstractClassesAndTraits\PersonAbstract;
use PHPUnit\Framework\MockObject\MockObject;

class EmployeeTest extends TestCase
{
    public function testFullName()
    {
        /** @var PersonAbstract|MockObject */
        $mock = $this->getMockBuilder(PersonAbstract::class)
                 ->setConstructorArgs(['John', 'Doe'])
                 ->getMockForAbstractClass();

        $mock->expects($this->any())
             ->method('getSalary')
             ->will($this->returnValue(6000));
        $this->assertSame('John Doe earns 6000 per month', $mock->showFullNameAndSalary());
    }
}
