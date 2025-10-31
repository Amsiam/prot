<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Experience extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_current' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    protected $appends = ['tags'];

    public function getDurationAttribute(): string
    {
        $start = $this->start_date ? $this->start_date->format('M Y') : '';
        $end = $this->is_current ? 'Present' : ($this->end_date?->format('M Y') ?? '');
        return trim("$start - $end");
    }

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
