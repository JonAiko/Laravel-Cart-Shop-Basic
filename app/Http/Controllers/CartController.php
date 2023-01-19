<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(session('cart'));
        $cant = 0;
        $amount_final = 0;
        foreach (Session::get('cart') as $key => $item) {
            $cant += $item['stock'];
            $amount_final += $item['total_u'];
        }
        #afinity details - amout-cant to buy
        session(['ei-cart' => array('amount_final' => $amount_final, 'cant' => $cant)]);
        return view('cart.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $quantity = 1;

        #Create array of info the product add
        $products = array(
            'id' => $product->id,
            'name' => $product->name,
            'image' => $product->image,
            'stock' => $quantity,
            'price' => $product->price,
            'total_u' => ($product->price * $quantity)
        );

        #verify if exists Session(Cart)
        if (Session::has('cart')) {
            #true
            $cart = Session::get('cart', []);
            #verify if exits product in cart
            foreach ($cart as $key => $item) {
                if ($item['id'] === $product->id) {
                    $cart[$key]['stock'] += $quantity;
                    $cart[$key]['total_u'] = $item['price'] * $item['stock'];

                    #refresh array
                    session(['cart' => $cart]);
                    return redirect()->route('home')->with('msj', 'Product Add');
                } else {
                    session()->push('cart', $products);
                }
            }
        } else {
            #false
            session(['cart' => [$products]]);
        }
        return redirect()->route('home')->with('msj', 'Product Add');
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
        $cart = Session::get('cart', []);
        foreach ($cart as $key => $value) {
            if ($id == $value['id']) {
                if ($request->stock_value == 0) {
                    unset($cart[$key]);
                    session(['cart' => $cart]);
                    if(count($cart) <1)
                    {
                        session()->pull('cart');
                        session()->pull('ei-cart');
                        return redirect()->route('home');
                    }
                } else {
                    $cart[$key]['stock'] = $request->stock_value;
                    $cart[$key]['total_u'] = $value['price'] * $request->stock_value;

                    session(['cart' => $cart]);
                }
                return redirect()->route('cart.index');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if (Session::has('cart')) {
            session()->pull('cart');
            session()->pull('ei-cart');
        }
        return redirect()->route('home');
    }

    public function deleteItem($id)
    {
        $cart  =Session::get('cart');
        foreach($cart as $key => $item){
            if($item['id']== $id)
            {
                unset($cart[$key]);
                session(['cart' => $cart]);
                if(count($cart)<1)
                {
                    session()->pull('cart');
                    session()->pull('ei-cart');
                    return redirect()->route('home');
                }
                return redirect()->route('cart.index');
            }
        }
    }
}
