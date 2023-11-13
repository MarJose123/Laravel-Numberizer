<?php

namespace MarJose123\LaravelNumberizer\Commands;

use Illuminate\Console\Command;

class LaravelNumberizerCommand extends Command
{
    public $signature = 'laravel-numberizer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
