<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalSkill extends Model
{
    use \App\Traits\HasTags;

    protected $guarded = ['id'];

    protected $appends = ['tags'];
}
