<?php

namespace MarJose123\LaravelNumberizer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MarJose123\LaravelNumberizer\LaravelNumberizer
 */
class LaravelNumberizer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MarJose123\LaravelNumberizer\LaravelNumberizer::class;
    }
}
