<?php
namespace App\forTestingAbstractClassesAndTraits;

class Employee extends PersonAbstract
{


    public function getSalary()
    {
        return 50 * 100; // $ * h
    }

}
