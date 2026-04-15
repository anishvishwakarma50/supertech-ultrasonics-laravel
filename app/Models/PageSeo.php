<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    use HasFactory;

    protected $table = 'page_seos';

    protected $fillable = [
        'page_name',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
    ];

    // Constants for page names
    const PAGE_HOME = 'home';
    const PAGE_ABOUT = 'about';
    const PAGE_PRODUCTS = 'products';

    /**
     * Get all available pages
     */
    public static function availablePages()
    {
        return [
            self::PAGE_HOME => 'Home Page',
            self::PAGE_ABOUT => 'About Page',
            self::PAGE_PRODUCTS => 'Products Page',
        ];
    }
}
