<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guard = ['id'];
    protected $fillable = ['name','parent_id'];
}
