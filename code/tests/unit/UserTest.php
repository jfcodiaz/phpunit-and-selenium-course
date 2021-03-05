<?php

namespace Tests\Unit;

use App\traits\CustomAssertionTrait;
use PHPUnit\Framework\TestCase;
use App\Database;
use App\User;

class UserTest extends TestCase
{
    use CustomAssertionTrait;

    public function testValidPrivateUserNameWhithClosuer()
    {
        $user = new User('bruce', 'wayne');
        $expected = 'Bruce';

        $phpunit = $this;
        $closure = function () use ($phpunit, $expected) {
            $phpunit->assertSame($expected, $this->name);
        };

        $binding = $closure->bindTo($user, get_class($user));
        $binding();

    }

    public function testValidProtectedLastNameWithExtetendedAnonimuosClass()
    {
        $user = new class('bruce', 'wayne') extends User{
            public function getLastName()
            {
                return $this->last_name;
            }
        };

        $this->assertSame('Wayne', $user->getLastName());
    }

    public function testValidDataFormat()
    {
        $user = new User('bruce', 'wayne');
        $mockedDb = new class extends Database {
            public function getEmailAndLastName()
            {
                return [
                   'name' => 'Bruce',
                   'last_name' => 'Wayne'
                ];
            }
        };

        $setUserClousere = function () use ($mockedDb) {
            $this->db = $mockedDb;
        };
        $executeSetUserClosure = $setUserClousere->bindTo($user, get_class($user));
        $executeSetUserClosure();

        $this->assertSame('Bruce Wayne', $user->getFullName());
    }

    public function testTestAPrivateMethod()
    {
        $user = new User('bruce', 'wayne');
        $expected = 'password hashed!';
        $phpunit = $this;
        $assertClosure = function () use ($phpunit, $expected) {
            $phpunit->assertSame($expected, $this->hashPassword());
        };

        $executedAssertClosure = $assertClosure->bindTo($user, get_class($user));
        $executedAssertClosure();

    }

    public function testTestAProtectedMethod()
    {
        $user = new class('bruce', 'wayne') extends User {
            public function getHashedPassword()
            {
                return $this->protectedHashPassword();
            }
        };
        $this->assertSame('password hashed!', $user->getHashedPassword());
    }

    public function testCustomDataStructure()
    {
        $data = [
            'nick' => 'Batman',
            'email' => 'bruce@wayne.net',
            'age' => 70
        ];
        $this->assertArrayData($data);
    }

    public function testSomeOperation()
    {
        $user = new User('bruce', 'wayne');
        $this->assertEquals('ok!', $user->someOperation([1,2,3]));
        $this->assertEquals('error', $user->someOperation([0]));
        $this->assertEquals('ok!', $user->someOperation([1]));
    }
}
