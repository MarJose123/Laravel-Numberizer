<?php

namespace MarJose123\LaravelNumberizer\Observers;

use Illuminate\Database\Eloquent\Model;
use MarJose123\LaravelNumberizer\LaravelNumberizer;

class NumberizerObserver
{

    private ?LaravelNumberizer $autoNumber;

    public function __construct(LaravelNumberizer $autoNumber)
    {
        $this->autoNumber = $autoNumber;
    }

    public function saving(Model $model)
    {
        $this->autoNumber->generate($model);
    }

}
