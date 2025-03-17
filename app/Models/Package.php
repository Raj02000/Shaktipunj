<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'overview',
        'location',
        'duration',
        'destination_id',
        'price',
        'discount',
        'overview',
        'itinerary',
        'trip_map',
        'include',
        'tag_id',
        'exclude',
        'cost_dates',
        'useful_info',
        'faqs',
        'extra',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'overview' => 'array',
        'itinerary' => 'array',
        'what_we_expect' => 'array',
        'cost_dates' => 'array',
        'include' => 'array',
        'exclude' => 'array',
        'useful_info' => 'array',
        'faqs' => 'array',
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

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_packages')
            ->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
