<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_history',
        'what_we_do',
        'about_company',
        'contact_details',
        'contact_number_2',
        'email',
        'address',
        'linkedin_url',
        'youtube_url',
        'instagram_url',
        'logo'
    ];
}
