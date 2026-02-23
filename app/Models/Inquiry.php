<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'lead_id',
        'product_id'
    ];

    // Inverse Relation to Product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }
}
