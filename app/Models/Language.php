<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_default' => 'boolean'
    ];

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }
}
