<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(4); //category: function catefory in Product class
        //pagination in index file
        
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.product.create', compact('categories'));
    }
    private function getSubCategories($parent_id, $process_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)->where('id', '<>', $process_id)->get();
        if ($categories->count()) {
            $categories = $categories->map(function($category) use($process_id) {
                $category->sub = $this->getSubCategories($category->id, $process_id);
                return $category;
            });
        }
        return $categories;
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'name' => 'required'
        ]);

        $attributes = $request->only(
                'category_id', 'product_code','name','price', 'is_highlight', 'description','detail', 'quantity', 'avatar'
        );
            
        if($request->hasFile('avatar')){
            $destinationDir = public_path('media/product');
            $extension = $request->avatar->extension();
            $filename = uniqid('vietpro').'.'.$extension;
            $request->avatar->move($destinationDir, $filename);
            $attributes['avatar'] = asset('media/product/'.$filename);
        }
        $product = Product::create($attributes);
        return redirect()->route('admin.products.create', $product->id)->with('success','Tao thanh cong SP');
    }

    public function edit()
    {
        return view('admin.product.edit');
    }
}
