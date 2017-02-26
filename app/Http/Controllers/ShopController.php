<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Prints;
use App\Orders;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index ()
    {
    	$prints = Prints::all();
    	return view('shop.index', compact('prints'));
    }

    public function cart ()
    {
    	if (!Session::has('cart')) {
    		return view('shop.cart');
    	}

    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
       	return view('shop.cart', ['products'=> $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function addToCart (Request $request, $id)
    {
    	$print = Prints::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($print, $print->id);
    	$request->session()->put('cart', $cart);
    	return redirect()->route('shop.index');
    }

    public function remove ($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shop.cart');
    }

    public function updateCart (Request $request, $id)
    {
        $print = Prints::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->addOne($print, $print->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('shop.cart');
    }

    public function removeSingular ($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeOne($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shop.cart');
    }

    public function checkout ()
    {
        if (!Session::has('cart')) {
            return view('shop.cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout (Request $request) 
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_lLt5hoVlQckcavZYLgJ4Vkpk');
        try {

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "cad",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));

            foreach($cart->items as $item) {
                $id = $item['item']['id'];
                $prints = Prints::find($id);
                if($prints) {
                    $prints->quantity -= $item['quantity'];
                    $prints->save();
                }
            }

            $order = new Orders();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('cust_name');
            $order->payment_id = $charge->id;
            $order->save();

        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage);
        }

        Session::forget('cart');
        return redirect()->route('shop.index')->with('success', 'Successfully placed your order!');
    }
}
