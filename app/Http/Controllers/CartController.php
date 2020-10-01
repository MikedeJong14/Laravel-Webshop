<?php

namespace App\Http\Controllers;

use App\Product;
use Redirect;
use Session;
use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Cart::getProducts();
        $totalPrice = Cart::calcTotalPrice();
        return view('cart.index')->with(['cartProducts' => $products, 'totalPrice' => $totalPrice]);
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
    public function store(Request $request, $productId)
    {
        Cart::addProduct($request, $productId);
        $product = Product::find($productId);
        return redirect($request['previousUrl'])->with(['success' => 'Product ' . $product->name . ' added to cart']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $message = Cart::updateItemQty($request, $productId);
        return back()->with(['success' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        Cart::removeProduct($productId);
        return back()->with(['success' => 'Product removed']);
    }

    /**
     * Empty the storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        Cart::emptyCart();
        return back()->with(['success' => 'Cart emptied']);
    }
}
