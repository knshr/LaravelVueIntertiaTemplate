<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class UserRepositoryEloquent extends RepositoryEloquent implements UserRepository
{
    protected $model;

    public function model()
    {
        return User::class;
    }

    public function userProducts() : Product
    {
        return $this->model->products();
    }
}