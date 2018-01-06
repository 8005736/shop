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
        $cart = Cart::groupby("product_id")->get();
		$products = array();
		
        foreach ($cart as $key => $value) {
            $cid = $value->id;
            if ($product = Product::find($value->product_id)){
                $products[$cid] = $product;
                // добавляем ключ, чтобы удалять только один товар
                $products[$cid]["cart_id"] = $cid;
				$products[$cid]["count"] = $value["count"];
            }
        }
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
		$product = Cart::where("product_id",$request->product_id)->first();
		
		//Если в корзине уже есть такой товар
		if ($product) {
			$count = $product->count;
			$product->count = $count+1;
			$product->save();
		} else {
			$cart = new Cart();
			$cart->product_id = $request->product_id;
			$cart->save();
		}

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
	
	
	//Функция для изменения количества товаров в корзине
	public function change(Request $request)
    {
        $cart = Cart::where("id",$request->product_id)->first();
		$count = $cart->count;
		$cart->count = $request->product_count;
        $cart->save();

        $result["text"] = "Количество товара изменено: " . $request->product_count;
        return json_encode($result);
    }
}
