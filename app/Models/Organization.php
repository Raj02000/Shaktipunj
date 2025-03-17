<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'menu_id',
        'second_menu_id',
        'alt_phone',
        'whatsapp_phone',
        'email',
        'facebook',
        'linkedIn',
        'twitter',
        'instagram',
        'pinterest',
        'youtube',
        'license_no',
        'extra',
    ];

    protected $casts = [
        'extra' => 'array',
    ];

    public function menu()
    {
        return $this->belongsTo(Destination::class, 'menu_id');
    }
    public function secondMenu()
    {
        return $this->belongsTo(Destination::class, 'second_menu_id');
    }
}
