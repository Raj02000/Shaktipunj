<?php

namespace App\Models;

use App\Enums\CoreValueType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'image',
        'title',
        'description',
    ];

    protected $casts = [
        'type' => CoreValueType::class,
        'description' => 'array',
    ];
}
