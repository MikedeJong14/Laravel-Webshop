<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Product;
use Session;

class Cart extends Model
{
    protected function getProducts()
    {
        $productData = Session::get('productData');
        if (!empty($productData)) {
            return $productData;
        }
    }

    protected function addProduct($form, $productId)
    {
        $product = Product::find($productId);
        $products = Session::get('productData');
        if (empty($products) || !isset($products[$productId])) {
            $products[$productId] = $product;
            $products[$productId]->itemQty = $form['amount'];
        } else {
            $products[$productId]->itemQty += $form['amount'];
        }
        Session::put('productData', $products);
    }

    protected function updateItemQty($form, $productId) {
        $products = Session::get('productData');
        $amt= $form['amount'];
        if ($amt > 0) {
            $products[$productId]->itemQty = $amt;
            Session::put('productData', $products);
            return 'Product amount updated';
        } else {
            unset($products[$productId]);
            Session::put('productData', $products);
            return 'Product removed';
        }
    }

    protected function removeProduct($productId) {
        $products = Session::get('productData');
        unset($products[$productId]);
        Session::put('productData', $products);
    }

    protected function emptyCart() {
        Session::flush();
    }

    protected function calcTotalPrice() {
        $totalPrice = 0;
        $products = Session::get('productData');
        if (!empty($products)) {
            foreach ($products as $product) {
                $totalPrice += ($product->price * $product->itemQty);
            }
        }
        return $totalPrice;
    }
}
