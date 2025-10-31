<?php

namespace App\Traits;

use App\Models\Tag;
use Illuminate\Support\Str;

trait HasTags
{

    public function tagsR()
    {
        return $this->morphToMany(Tag::class, 'taggable');
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
