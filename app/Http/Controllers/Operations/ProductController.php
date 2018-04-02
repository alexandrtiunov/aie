<?php

namespace App\Http\Controllers\Operations;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $categories = Category::all();

        return view('operations.addproduct', ['categories' => $categories]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = $this->validate(request(), [
            'name' => 'required',
            'category_id' => 'required',
        ]);

        if (Product::create($product)) {
            return back()->with('success', 'Продукт добавлен');
        }
        return back()->with('error', 'Operation error');
    }
}
