<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'moq',
        'specification_id'
    ];

    // Images of product
    public function images(): HasMany 
    {
        // the following hasMany method had passed optional values which is automatically taken by Laravel itself
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    // Primary Image of Product
    public function primaryImage(): HasOne
    {
        // Now we have to return an image with latest or oldest of many based on timestamp
        return $this->hasOne(ProductImage::class)->oldestOfMany();
    }

    // Return the Inquiries
    public function inquiries() : HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    // Specification
    public function specification(): BelongsTo
    {
        // return $this->BelongsTo(Specification::class);
        return $this->belongsTo(Specification::class);
    }
}
