<?php

namespace Tests\Unit;

use App\BMICalculator;
use PHPUnit\Framework\TestCase;

class BMICalculatorTest extends TestCase
{
    public function testUnderweight_BMI_text_result()
    {
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 10;
        $result = $BMICalculator->getTextResultFromBMI();
        $expected = 'Underweight';

        $this->assertSame($expected, $result);
    }

    public function testNormal_BMI_text_result()
    {
        $expected = 'Normal';
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 24;
        $result = $BMICalculator->getTextResultFromBMI();

        $this->assertSame($expected, $result);
    }

    public function testOverweight_BMI_text_result()
    {
        $expected = 'Overweight';
        $BMICalculator = new BMICalculator;
        $BMICalculator->BMI = 28;
        $result = $BMICalculator->getTextResultFromBMI();

        $this->assertSame($expected, $result);
    }

    public function testCorrect_BMI_Value()
    {
        $expected = 39.1;
        $BMICalculator = new BMICalculator;
        $BMICalculator->mass = 100;
        $BMICalculator->height = 1.6;
        $result = $BMICalculator->calculate();

        $this->assertEquals($expected, $result);

    }
}
