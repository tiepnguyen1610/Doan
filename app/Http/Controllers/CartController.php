<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Size;
use App\Color;
use Cart;

class CartController extends Controller
{
 	public function index()
 	{
 		$carts = Cart::content();
 		return view('frontend.pages.shoppingcart',compact('carts'));
 	}

 	public function addToCart(Request $request,$id)
 	{
 		$product = Product::find($id);
 		$productSize = Size::where('id', $request->size_id)->first();
 		$productColor = Color::where('id', $request->color_id)->first();
 		Cart::add([
 			'id' => $product->id,
 			'name' => $product->pro_name,
 			'qty' => 1,
 			'price' => ($product->promotional_price != 0) ? $product->promotional_price : $product->sale_price,
 			'weight' => 550,
 			'options' => [
 				'size' => $request->size_id,
 				'size_name' => $productSize->size,
 				'color' => $request->color_id,
 				'color_name' => $productColor->name,
 				'image' => $product->image_path
 			],
 		]);
 		
 		return redirect()->route('cart.index');
 	}

 	public function updateCart(Request $request)
 	{
 		Cart::update($request->rowId,$request->qty);
 		return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
 	}
 	
 	public function deleteCart($rowId)
 	{
 		Cart::remove($rowId);
 		return redirect()->back();
 	}

 	public function deleteAll()
 	{
 		Cart::destroy();
 		return redirect()->route('cart.index');
 	}      
}
