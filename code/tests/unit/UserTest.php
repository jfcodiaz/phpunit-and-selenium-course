<?php

namespace Tests\Unit;

use App\Database;
use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{
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

}
