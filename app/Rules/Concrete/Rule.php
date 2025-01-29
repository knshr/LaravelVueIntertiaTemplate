<?php

namespace App\Rules\Concrete;

use Illuminate\Support\Arr;
use App\Rules\Contracts\RuleInterface;

abstract class Rule extends RuleInterface
{
    private $errors = [];

    public function passes()
    {
        return count($this->errors) === 0;
    }

    public function fails()
    {
        return count($this->errors) > 0;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function errorMessages()
    {
        $errors = [];

        foreach ($this->errors as $error) {
            $errors[] = is_array($error) && array_key_exists('message', $error) 
                ? $error['message']
                : $error;
        }

        return $errors;
    }

    protected function message($message)
    {
        $this->errors = Arr::merge($this->errors, $message);
    }
}