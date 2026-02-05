<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll(Request $request){
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
        $product->update(request()->all());
        $categories = Category::all();
        return view('admin.products.edit', compact('categories', 'product'));
    }
    public function search(Request $request){
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        return view('products.index', compact('products'));
    }
}