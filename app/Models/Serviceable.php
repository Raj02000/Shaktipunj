<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviceable extends Model
{
    use HasFactory;

    protected $table = 'serviceable';

    protected $fillable = [
        'image',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function serviceable()
    {
        return $this->morphTo();
    }
}
