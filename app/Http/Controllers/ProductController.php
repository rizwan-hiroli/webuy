<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductController extends Controller
{


    
    public function products()
    {

    	if(\Auth::check() == false || auth()->user()->role != 'ADMIN'){
    		abort(401);
    	}

        $products = Product::paginate(5);
        return view('admin',compact('products'));

    }

    public function categories()
    {
    	if(\Auth::check() == false || auth()->user()->role != 'ADMIN'){
    		abort(401);
    	}

        $categories = Category::paginate(5);
        return view('categories',compact('categories'));

    }

    public function addCategories()
    {
    	if(\Auth::check() == false || auth()->user()->role != 'ADMIN'){
    		abort(401);
    	}

        return view('add-category');
    }

    public function storeCategories(Request $request)
    {	
        
    	if(\Auth::check() == false || auth()->user()->role != 'ADMIN'){
    		abort(401);
    	}

        $categories = Category::create($request->all());
        return response()->json(['sucess'=>'New category added.'],200);
    }

    public function addProduct()
    {
    	if(\Auth::check() == false || auth()->user()->role != 'ADMIN'){
    		abort(401);
    	}

    	$categories = Category::pluck('title','id')->toArray();
        return view('add-product',compact('categories'));
    }

    /**
     * function to add product
     */
    public function storeProduct(Request $request)
    {	
    	$cover = $request->file('image');
    	$extension = $cover->getClientOriginalExtension();
    	\Storage::disk('public')->put($cover->getFilename().'.'.$extension,  \File::get($cover));
        $product = Product::create($request->all());
        return response()->json(['sucess'=>'New product added.'],200);
    }


}
