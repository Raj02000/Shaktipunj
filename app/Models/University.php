<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'image',
        'country_id',
    ];

    public function countries()
    {
        return $this->belongsTo(Destination::class, 'country_id');
    }
}
