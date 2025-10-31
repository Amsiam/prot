<?php

namespace App\Models;

use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;

class MySelf extends Model
{
    use HasTags;

    protected $guarded = ['id'];

    protected $appends = ['tags'];
}
