<?php
namespace App;

class BMICalculator
{
    public $BMI;
    public $mass;
    public $height;

    public function calculate()
    {
        return round($this->mass / pow($this->height, 2), 1);
    }

    public function getTextResultFromBMI()
    {
        if ($this->BMI < 18) {
            return 'Underweight';
        } else if ($this->BMI >= 18 && $this->BMI <= 25) {
            return 'Normal';
        } else {
            return 'Overweight';
        }
    }
}
