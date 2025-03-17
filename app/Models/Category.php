<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'publish',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
        static::updating(function ($model) {
            if (
                $model->slug == 'best-seller' ||
                $model->slug == 'trending-packages'
            ) {
                $model->slug = $model->slug;
            } else {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'category_packages')->withTimestamps();
    }
}
