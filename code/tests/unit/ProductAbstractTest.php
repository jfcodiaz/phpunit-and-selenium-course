<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\ProductAbstract;

class ProductAbstractTest extends TestCase
{
    public function testProductAbstract()
    {
        $productAbstract = new class extends ProductAbstract {
        };
        $this->assertSame('done!', $productAbstract->doSomething());
    }
}
