<?php

namespace App\Services\Contracts;

interface ProductServiceInterface
{
    public function store(array $attributes);
    public function update(array $attributes, $id);
    public function delete($id);
}