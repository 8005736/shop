<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::all();
        foreach ($cart as $key => $value) {
            $cid = $value->id;
            if ($product = Product::find($value->product_id)){
                $products[$cid] = $product;
                // добавляем ключ, чтобы удалять только один товар
                $products[$cid]["cart_id"] = $cid;
            }
        }
		
		$products = empty($products) ? array() : $products;
		
        return view('cart',
            [
                'products' => $products,
                'pagetitle' => 'Корзина'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cart = new Cart();
        //$product = Product::findOrFail($request->product_id);
        $cart->product_id = $request->product_id;
        $cart->save();

        $result["text"] = "Товар успешно добавлен в корзину";
        return json_encode($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        $result["text"] = "Товар успешно удален";
        return json_encode($result);
    }
}
