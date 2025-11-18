<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['tags'];

    public function tagsR()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function videos()
    {
        return $this->hasMany(ProjectVideo::class)->orderBy('order');
    }

    public function setTagsAttribute($value)
    {
        $tagIds = collect(explode(',', $value))->map(function ($tagName) {
            return Tag::firstOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            )->id;
        });

        if ($this->exists) {
            $this->tagsR()->sync($tagIds);
        } else {
            $this->saved(function ($model) use ($tagIds) {
                $model->tagsR()->sync($tagIds);
            });
        }
    }

    public function getTagsAttribute(): array
    {
        return $this->tagsR()->pluck('name')->toArray();
    }
}
