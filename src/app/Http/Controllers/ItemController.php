<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Category;
use App\Models\Condition;
use GuzzleHttp\Handler\Proxy;

class ItemController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('index',compact('products'));
    }

    public function show($id){
        // $product = Product::find($id);
        // $category = Category::find($product->category_id);
        $product = Product::with('categories')->find($id);
                    if (!$product) {
                    abort(404);
                    }

        $condition = Condition::find($product->condition_id);
        $favorites = Favorite::where('user_id', auth()->id())->with('product')->get();

        return view('item',compact('product','condition','favorites',));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();
        return view('index', compact('products'));
    }
}
