<?php
namespace App\forTestingAbstractClassesAndTraits;

trait MyTrait
{

    public function traitMethod($number)
    {
        return $number + 10;
    }
}
