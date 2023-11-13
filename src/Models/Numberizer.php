<?php

namespace MarJose123\LaravelNumberizer\Models;

use Illuminate\Database\Eloquent\Model;

class Numberizer extends Model
{
    protected $fillable = [
        'name',
        'number',
    ];
}
