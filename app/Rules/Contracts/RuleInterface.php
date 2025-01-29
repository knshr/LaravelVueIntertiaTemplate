<?php 

namespace App\Rules\Contracts;

interface RuleInterface
{
    public function passes();
    public function fails();
    public function errors();
}