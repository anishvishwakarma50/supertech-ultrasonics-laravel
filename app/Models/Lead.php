<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'contact_person_name',
        'phone_no',
        'location'
    ];

    // Lead has Many Inquiries
    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }
}
 