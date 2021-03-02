<?php

namespace Tests\fixtures;

use App\ShopingCart;
use PHPUnit\Framework\TestCase;
use Tests\traits\DatabaseTrait;
use Tests\traits\ShoppingCartFixtureTrait;

class ShopingCartTest extends TestCase
{
    use DatabaseTrait;
    use ShoppingCartFixtureTrait;

    public function testCorrectNumberOfItems()
    {
        $expected = 1;
        $this->cart->addItem('one');
        $result = $this->cart->amount;
        $this->assertEquals($expected, $result);
    }

    public function testCorrectProductName()
    {
        $this->cart->addItem('Apple');
        $this->assertContains('Apple', $this->cart->cartItems);
    }

}
