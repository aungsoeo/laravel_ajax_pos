<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code','image'];
    protected $table = "products";


    public function category()
    {
    	return $this->belongsT0('App\Category');
    }
}
