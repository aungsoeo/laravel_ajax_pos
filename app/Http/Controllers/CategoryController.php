<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;
use Validator;
class CategoryController extends Controller
{
    public function index()
    {		
    		$categories=Category::orderby('id')->paginate(10);
    		return view('category.index',['categories'=>$categories]);
    }

    public function create()
    {
        return view('category.addcat');
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

    public function edit($id)
    {   
        $category = Category::find($id);
        // dd($category);
        return view('category.editcat',compact('category'));
    }

    public function update($id, Request $request)
    {
    		// dd($request->all());

			$validator = Validator::make($request->all(), [
		            'name' => 'required',
		        ]);
		        
		       if ($validator->fails()) {
		            return redirect()->back()
		              ->withInput()
		              ->withErrors($validator); 
		        }

		      $arr=[
	                'name' => $request->name ,
	                'description' =>$request->description,
	            ];
	            // dd($arr);
	           $category = Category::findOrFail($id);
	           // dd($category);
			$category->fill($arr)->save();

	        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
      $cat = Category::find($id)->delete();
      return redirect()->back()->with('success','Post is successfully deleted!');
    }
}

