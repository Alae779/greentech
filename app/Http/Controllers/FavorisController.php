<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use App\Models\Product;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function show(Request $request){
        $user = $request->user();
        $favoris = $user->favoris()->with('category')->get();
        return view('products.favoris', compact('favoris'));
    }
    public function toggle(Request $request, Product $product){
        $user = $request->user();
        // dd($user);
        // dd($user, $product->id);

        $user->favoris()->toggle($product->id);
        return redirect('/');
    }
}
