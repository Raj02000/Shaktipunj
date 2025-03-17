<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'publish',
        'parent_id',
        'thumbnail',
        'extra',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'description' => 'array',
        'extra' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
        static::updating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    public function parent()
    {
        return $this->belongsTo(Destination::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Destination::class, 'parent_id');
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'destination_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'country_id');
    }
}
