<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function index ()
    {
    	$orders = Orders::paginate(10);
    	return view('admin.orders.index', compact('orders'));
    }

    public function details ($id)
    {
    	$orders = Orders::where('id', $id)->get();
    	$orders->transform(function ($order, $key) {
    		$order->cart = unserialize($order->cart);
    		return $order;
    	});
    	return view('admin.orders.details', compact('orders'));
    }
}
