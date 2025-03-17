<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'start_date',
        'people',
        'title',
        'f_name',
        'l_name',
        'email',
        'country',
        'country_code',
        'phone',
        'pickup_details',
        'comments',
        'terms',
        'total_amount',
    ];

    // Attribute casting
    protected $casts = [
        'start_date' => 'date', // Cast to date
        'people' => 'integer', // Cast to integer
        'terms' => 'boolean', // Cast to boolean
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
