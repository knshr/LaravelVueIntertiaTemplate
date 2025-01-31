<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\Repository;

abstract class RepositoryEloquent implements Repository
{
    protected $model;
    
    abstract public function model();
}