<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;

class CheckoutController extends Controller
{
	/**
	 * Hiển thị form thanh toán đơn hàng
	 */
    public function getCheckout()
    {
    	$carts = Cart::content();
    	return view('frontend.pages.checkout', compact('carts'));
    }
    /**
     * Lưu thông tin đơn hàng và chi tiết đơn hàng
     */
    public function postCheckout(Request $request)
    {
    	$totalprice = str_replace(',','',Cart::subtotal(0,2));

    	$orderId = Order::insertGetId([
    		'fullname' => $request->txtName,
    		'email'    => $request->txtEmail,
    		'phone'    => $request->txtPhone,
    		'address'  => $request->txtAddress,
    		'totalprice' => (int)$totalprice,
    		'payment' => $request->check_method,
    		'note' 	  => $request->txtNote,
    		'status'  => 0,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);

    	if($orderId){
    		$products = Cart::content();
    		foreach($products as $product) {
    			OrderDetail::insert([
    				'order_id' =>$orderId,
                    'image' =>$product->options->image,
    				'product_id' =>$product->id,
    				'id_size' => $product->options->size,
    				'id_color' => $product->options->color,
    				'quantity' => $product->qty,
    				'price' =>$product->price,
                    'subtotal' =>$product->subtotal
    			]);
    		} 
    	}
    	Cart::destroy();
    	return redirect()->route('cart.index')->with('success','Đặt hàng thành công!');
    }
}
