<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guard = ['id'];
    protected $fillable = ['category_id','product_code','name','price', 'is_highlight', 'description','detail', 'quantity', 'avatar'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
