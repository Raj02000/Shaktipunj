<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'sub_title',
        'title',
        'description',
        'extra',
    ];

    protected $casts = [
        'extra' => 'array',
    ];
}
