<?php

namespace MarJose123\LaravelNumberizer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use InvalidArgumentException;

class LaravelNumberizer
{
    private function generateUniqueName(array $options): string
    {
        return md5(serialize($options));
    }

    public function evaluate(array $overrides = [])
    {
        $config = array_merge(
            config('autonumber', []),
            $overrides
        );

        if (is_callable($config['format'])) {
            $config['format'] = call_user_func($config['format']);
        }

        foreach ($config as $key => $value) {
            if (is_null($value)) {
                throw new InvalidArgumentException($key.' param cannot be null');
            }
        }

        return $config;
    }

    private function getNextNumber($name, $config)
    {
        $autoNumber = Numberizer::where('name', $name)->first();

        if ($autoNumber === null) {
            $autoNumber = new Numberizer([
                'name' => $name,
                'number' => $config['startingValue'],
            ]);
        } else {
            $autoNumber->number += 1;
        }

        $autoNumber->saveQuietly();

        return $autoNumber->number;
    }

    protected function exist_function(Model $model, string $hook): bool
    {
        return is_callable(array(new $model(), $hook), true);
    }

    public function generate(Model $model): bool
    {
        if($this->exist_function($model,'NumberizerOptions'))
        {
            foreach ($model->numberizerOptions() as $attribute => $options) {
                if (is_numeric($attribute)) {
                    $attribute = $options;
                    $options = [];
                }
                $config = $this->evaluate($options);
                $uniqueName = $this->generateUniqueName(
                    array_merge(
                        ['class' => get_class($model)],
                        Arr::except($config, ['onUpdate'])
                    )
                );
                $autoNumber = $this->getNextNumber($uniqueName, $config);
                if ($length = $config['length']) {
                    $autoNumber = str_replace('?', str_pad($autoNumber, $length, '0', STR_PAD_LEFT), $config['format']);
                }
                $model->setAttribute($attribute, $autoNumber);
            }
        }
        return $model->isDirty();

    }
}
