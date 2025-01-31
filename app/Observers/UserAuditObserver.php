<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class UserAuditObserver
{
    /**
     * Listen to the Model creating event.
     *
     * @param  Model  $model
     * @return void
     */
    public function creating($model)
    {
        if (Auth::check()) {
            if(is_null($model->created_by)) {
                $model->created_by = Auth::user()->id;
            }

            if(is_null($model->modified_by)) {
                $model->modified_by = Auth::user()->id;
            }
        }
    }

    /**
     * Listen to the Model updating event.
     *
     * @param  Model  $model
     * @return void
     */
    public function updating($model)
    {
        if (Auth::check()) {
            $model->modified_by = Auth::user()->id;
        }
    }
}