<?php

namespace App\Models;

use App\Enums\Enums\ReviewStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rating',
        'message',
        'status',
        'date',
        'extra',
    ];

    protected $casts = [
        'message' => 'array',
        'status' => ReviewStatus::class
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
