<?php

namespace App\Repositories\Contracts;

use App\Models\Product;

interface UserRepository extends Repository
{
    public function userProducts(): Product;
}