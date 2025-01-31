<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Concrete\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $service;
    private $entity;

    public function __construct(ProductService $service)
    {   
        $this->service = $service;
        $this->entity = Product::class;
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $result = $this->service->store($this->data($request));
        } catch (Exception $e) {
            Log::info($e);
            return $this->errorResponse(array(
                'store.failed' => 'Save Failed'
            ));
        }

        return $this->successfulResponse([
            $result,
        ], 'Product Created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $result = $this->service->update($this->data($request),$id);
        } catch (Exception $e) {
            Log::info($e);
            return $this->errorResponse(array(
                'update.failed' => 'Update Failed'
            ));
        }

        return $this->successfulResponse([
            $result,
        ], 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $result = $this->service->delete($id);
        } catch (Exception $e) {
            Log::info($e);
            return $this->errorResponse(array(
                'delete.failed' => 'Delete Failed'
            ));
        }

        return $this->successfulResponse([], 'Product Deleted');
    }

    private function data(Request $request)
    {
        $fields = [
            'name', 'price'
        ];

        return $request->only($fields);
    }
}
