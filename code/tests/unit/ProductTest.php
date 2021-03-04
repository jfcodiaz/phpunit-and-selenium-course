<?php
namespace Tests\Unit;

use App\Product;
use App\SessionInterface;
use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{

    public function testProduct()
    {
        $session = new class implements SessionInterface{
            public function open()
            {
            }
            public function close()
            {
            }
            public function write($product)
            {
                return true;
            }
        };
        $product = new Product($session);
        $this->assertSame('product 1', $product->fetchProductById(1));
    }

}
