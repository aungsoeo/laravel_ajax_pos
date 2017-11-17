<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ReceivingController extends Controller
{
     public function index()
     {	

     		$product = Product::all();
     		return view('receive.index');
     }

     public function get_product()
     {	
     		if(isset($_POST['product_code']))
     		{
     			$product = Product::where('code', '=', $_POST['product_code'])->get();
     			var_dump($product);
     		}
     		
     }
}
