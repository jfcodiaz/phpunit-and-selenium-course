<?php

namespace App;

use App\SessionInterface;

/**
 * @codeCoverageIgnore
 */
class Session implements SessionInterface
{
    public function open()
    {
        echo 'real opening the seassion';
    }

    public function close()
    {
        echo 'real closing the session';
    }

    public function write($product)
    {
        echo 'real writing to the seasion ' . $product;

    }
}
