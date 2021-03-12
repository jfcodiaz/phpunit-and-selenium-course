<?php

namespace App;

class RandomService
{
    public function __invoke()
    {
        return mt_rand(0, 2);
    }
}
