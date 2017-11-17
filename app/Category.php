<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{
     protected $fillable = [
        'name', 'description', 
     ];
     protected $table = 'categories';

     public function product()
     {
		return $this->hasMany('App\Product','category_id');
     }
}
