<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;    
    }
    public function userProducts() : Product
    {
        return $this->repository->userProducts();
    }
}
