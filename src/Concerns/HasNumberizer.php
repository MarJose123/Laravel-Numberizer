<?php

namespace MarJose123\LaravelNumberizer\Concerns;

use MarJose123\LaravelNumberizer\Observers\NumberizerObserver;

trait HasNumberizer
{
    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootAutoNumberTrait()
    {
        static::observe(NumberizerObserver::class);
    }

}
