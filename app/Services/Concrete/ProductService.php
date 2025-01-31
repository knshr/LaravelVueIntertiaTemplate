<?php

namespace App\Services\Concrete;

use App\Models\Product;
use App\Services\Contracts\ProductServiceInterface;
use App\Traits\DatabaseTransaction;

class ProductService extends BaseService implements ProductServiceInterface
{
    use DatabaseTransaction;

    protected function model()
    {
        return Product::class;
    }
}