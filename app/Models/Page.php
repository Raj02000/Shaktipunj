<?php

namespace App\Models;

use App\Enums\PageModelEnum;
use App\Enums\PageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'model',
        'type',
        'content',
        'display_order',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'content' => 'array',
        'model' => PageModelEnum::class,
        'type' => PageType::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->slug == 'our-teams') {
                $model->slug = 'our-teams';
            } else {
                $model->slug = Str::slug($model->title);
            }
        });
        static::updating(function ($model) {
            if ($model->slug == 'our-teams') {
                $model->slug = 'our-teams';
            } else {
                $model->slug = Str::slug($model->title);
            }
        });
    }
}
