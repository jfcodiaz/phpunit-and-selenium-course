<?php

namespace App;

class Product extends ProductAbstract
{
    public function __construct(SessionInterface $session)
    {
        $this->session = $session = $session;
    }

    public function fetchProductById($id)
    {
        $product = 'product 1';
        $this->session->write($product);
        return $product;
    }
}
