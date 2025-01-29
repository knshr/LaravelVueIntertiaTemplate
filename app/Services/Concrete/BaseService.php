<?php

namespace App\Services\Concrete;

use App\Traits\DatabaseTransaction;
use Illuminate\Support\Facades\App;

abstract class BaseService
{
    use DatabaseTransaction;

    /**
     * Persist entity in database
     * 
     * @param  array  $attributes
     * @return Model            
     */
    public function store(array $attributes)
    {
        $that = $this;

        return $this->transaction(function() use ($attributes, $that) {
            $attributes = $that->transform($attributes);

            $model = App::make($that->model())
                ->newInstance()
                ->fill($attributes);
            
            $model->save();

            return $model;
        });
    }

    /**
     * Update entity in database by id
     * 
     * @param  array  $attributes
     * @param  int    $id
     * @return Model            
     */
    public function update(array $attributes, $id)
    {
        $that = $this;

        return $this->transaction(function () use($attributes, $id, $that) {
            $attributes = $that->transform($attributes);

            $model = App::make($that->model())->findOrFail($id);
            $model->fill($attributes);
            $model->save();

            return $model;
        });
    }

    /**
     * Persist or update entity in database
     *
     * @param  array  $attributes
     * @param  array  $values    
     * @return Model            
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $that = $this;

        return $this->transaction(function () use($attributes, $values, $that) {
            $values = $that->transform($values);

            $model = App::make($that->model())
                ->newInstance()
                ->updateOrCreate($attributes, $values);

            return $model;
        });
    }

    /**
     * Delete entity in database by id
     * @param  int $id
     * @return bool    
     */
    public function delete($id)
    {
        $model = App::make($this->model())->findOrFail($id);
        
        $deleted = $model->delete();

        return $deleted;
    }

    protected function transform($data)
    {
        return $data;
    }

    protected abstract function model();
}