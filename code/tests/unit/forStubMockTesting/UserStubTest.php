<?php
namespace Tests\Unit\forStubMockTesting;

use PHPUnit\Framework\TestCase;
use App\forStubMockTesting\User;

class UserStubTest extends TestCase
{

    public function testCreateUser()
    {
        $stub = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['save','createUser'])
            ->getMock();

        $stub->method('createUser')->willReturn(true, false);
        $this->assertTrue($stub->createUser('Adam', 'email@com.pl'));
        $this->assertFalse($stub->createUser('Adam', 'email'));
    }

    public function testCreatADefaultStup()
    {
        $stub = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->assertNull($stub->save());

        $stub = $this->createStub(User::class);
        $this->assertNull($stub->save());
    }

    public function testMockMethodsAndUseORiginalsMethods()
    {
        $stub = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
         ->onlyMethods(['createUser'])
         ->getMock();  // works like a real object

        $stub->method('createUser')->willReturn('fake');
        $this->assertSame('fake', $stub->createUser('Bruce Wayne', 'bruce@wayneenterprises.net'));
        ob_start();
        $stub->save();
        $output = ob_get_clean();
        $this->assertSame('User was saved in database - real operation!', $output);
    }
}
