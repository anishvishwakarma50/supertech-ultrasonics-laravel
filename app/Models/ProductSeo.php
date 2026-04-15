<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSeo extends Model
{
    use HasFactory;

    protected $table = 'product_seos';

    protected $fillable = [
        'product_id',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
    ];

    /**
     * Get the product that owns this SEO data
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
