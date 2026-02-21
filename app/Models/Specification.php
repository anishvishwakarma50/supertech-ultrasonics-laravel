<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specification extends Model
{
    protected $table = 'specification';
    protected $fillable = [
        'usage',
        'material',
        'weight',
        'voltage',
        'color',
        'frequency',
        'temperature'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'specification_id');
    }
}
