<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use function Laravel\Prompts\error;

class ProductController extends Controller
{
    public function index(Request $request){
            $category_id = $request->input("category");
            if($category_id){
                $products = Product::where('category_id', $category_id)->get();
            }else{
                $products = Product::with('category')->get();
            }
            return view('products.index', compact('products'));
    }
    public function show($id){
        $products = Product::with('category')->get();
        $product = Product::find($id);
       $this->authorize('view', $product);
        return view('products.show', compact('product', 'products'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request){
        Product::create($request->all());
        return redirect('/');
    }
    public function delete($id){
        $product = Product::destroy($id);
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('categories', 'product'));
    }
    public function update($id){
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);
        $product->update(request()->all());
        $categories = Category::all();
        return view('admin.products.edit', compact('categories', 'product'));
    }
    public function search(Request $request){
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        return view('products.index', compact('products'));
    }
    public function silhn(){
        $product = Product::all();
        foreach($product as $pr){
            $pr->category->title;
        }
    }
    public function kugs(){
        $product = Product::with('category');
    }
}