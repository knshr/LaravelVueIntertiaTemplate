<?php

namespace App\Models;

use App\Traits\UserAudit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes,
        UserAudit {
            UserAudit::runSoftDelete insteadof SoftDeletes;
        }
    
    protected $fillable = [
        'name',
        'price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
