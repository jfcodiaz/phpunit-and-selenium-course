<?php
namespace Tests\Unit;

use App\BMICalculator;
use App\Exceptions\WrongBmiDataException;
use PHPUnit\Framework\TestCase;
use trigger_error;

class ErrorsExceptionsTest extends TestCase
{

    public function testTriggerError() : void
    {
        $this->expectError();
        fopen('/randomfile.txt', 'r');
    }

    public function testTriggerErrrorWithAMessage() : void
    {
        $this->expectError();
        trigger_error('food', \E_USER_ERROR);
    }

    public function testThrowException() : void
    {
        $this->expectErrorMessage('food');
        throw new \Exception('food');
    }

    public function testException() : void
    {
        $this->expectException(WrongBmiDataException::class);
        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 0;
        $BMICalculator->height = 1.6;
        $BMICalculator->calculate();

    }

}
