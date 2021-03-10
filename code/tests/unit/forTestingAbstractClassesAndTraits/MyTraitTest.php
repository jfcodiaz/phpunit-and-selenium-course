<?php

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use App\forTestingAbstractClassesAndTraits\MyTrait;

class MyTraitTest extends TestCase
{

    public function testMyMethod() : void
    {
        /** @var MyTrait|MockObject */
        $mock = $this->getMockBuilder(MyTrait::class)
            ->getMockForTrait();
        $this->assertSame(20, $mock->traitMethod(10));
    }
}
