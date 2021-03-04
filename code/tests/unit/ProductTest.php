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
        $product->setLoggerCallable(function () {
            echo 'Real Logger was no called!';
        });
        ob_start();
        $result = $product->fetchProductById(1);
        $out = ob_get_clean();
        $this->assertSame('Real Logger was no called!', $out);
        $this->assertSame('product 1', $result);
    }
}
