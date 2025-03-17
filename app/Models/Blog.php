<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'tag_id',
        'content',
        'image',
        'short_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
