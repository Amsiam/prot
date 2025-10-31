<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Publication extends Model
{
    use \App\Traits\HasTags;
    protected $guarded = ['id'];

    protected $appends = ['tags'];
}
