<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use paginate;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::orderby('id')->paginate(10);
    	// foreach ($products as $p) {
    	// 	echo $p->id;
    	// }
    	// dd($products);
    	return view('product.index',['products'=>$products]);
    }

    public function create()
    {
    	$cat = Category::orderBy('id', 'asc')->get();
    	// dd($cat);
    	return view('product.create',compact('cat'));
    }

    public function store(Request $request)
    {		 
    		// dd($request->all());

    		$category = new Category;
			$category->name = Input::get('name');
			$category->description = Input::get('description');

			$validator = Validator::make($request->all(), [
		            'name' => 'required',
		        ]);
		        
		       if ($validator->fails()) {
		            return redirect()->back()
		              ->withInput()
		              ->withErrors($validator); 
		        }

		      $arr=[
	                'name' => $category->name ,
	                'description' =>$category->description,
	            ];
	            // dd($arr);
	        
	        	$res=Category::create($arr);

	        return redirect()->route('admin.category.index');

    }
}
