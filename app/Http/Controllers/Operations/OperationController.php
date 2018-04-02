<?php

namespace App\Http\Controllers\Operations;

use App\Category;
use App\Operation;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GetCurrency\CurrencyPB;

class OperationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $users = User::all();

        $products = Product::all();

        return view('operations.create', ['categories' => $categories, 'users' => $users, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operation = $this->validate(request(), [
            'product_id' => 'required',
            'created_at' => 'required',
            'value_UAH' => 'required',
            'category_id' => 'required',
            'note' => 'required',
        ]);
        $operation ['user_id'] = Auth::user()->id;
        $operation ['currency'] = CurrencyPB::getKurs();
        $operation ['value_USD'] = (double)$operation['value_UAH']/$operation['currency'];
        $operation ['value_USD'] = round($operation ['value_USD'], 3);
dd($operation);
        if (Operation::create($operation)) {
            return back()->with('success', 'Операция добавлена');
        }
        return back()->with('error', 'Operation error');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operations = Operation::find($id);

        $categories = Category::all();

        $products = Product::all();

        return view('operations.edit', compact('operations', 'id'), ['categories' => $categories, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $operations = Operation::find($id);

        $this->validate(request(), [
            'product_id' => 'required',
            'value_UAH' => 'required',
            'category_id' => 'required',
        ]);

        $operations->product_id = $request->get('product_id');
        $operations->value_UAH = $request->get('value_UAH');
        $operations->category_id = $request->get('category_id');
        $operations->value_USD = (double)$operations['value_UAH']/$operations['currency'];

        $operations->save();

        return redirect('/')->with('success', 'Операция обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $operations = Operation::find($id);
        $operations->delete();
        return redirect('/')->with('success', 'Операция удалена');
    }
}
