<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Product;

class OrderController extends Controller
{
    /**
     *  Danh Sách Đơn Hàng
     */
    public function index()
    {
    	$orders = Order::latest()->paginate(10);
    	return view('backend.admin.orders.order', compact('orders'));
    }

    /**
     *  Chi Tiết Đơn Hàng
     */
    public function orderDetail(Request $request,$id)
    {
    	if($request->ajax())
    	{
    		$ordersdetail = OrderDetail::Where('order_id',$id)->get();
    		$html = view('backend.admin.orders.orderdetails', compact('ordersdetail'))->render();
    	}
    	return response()->json($html);
    }

    /**
     * Xử lý trạng thái đơn hàng
     */
    public function activeOrder($id)
    {
        $order = Order::find($id);
        $orderdetails = OrderDetail::Where('order_id',$id)->get();

        if ($orderdetails)
        {
            //Cập nhật lại số lượng sản phẩm
            foreach ($orderdetails as $item)
            {
                $product = Product::find($item->product_id); 
                if($product->quanty < $item->quantity)
                {
                    return redirect()->back()->with([
                        'level' => 'warning',
                        'message' => 'Chú ý! Sản phẩm tồn kho không đủ!'
                    ]);
                }
                $product->quanty = $product->quanty - $item->quantity;
                $product->save();  
            }
        }
        $order->status = Order::STATUS_DONE;
        $order->save();

        return redirect()->back()->with([
            'level' => 'success',
            'message' => 'Xử lý đơn hàng thành công'
        ]);
    }

    /**
     * Huỷ đơn đặt hàng
     */
    public function unOrder($id)
    {
        $order = Order::find($id);
        $orderdetails = OrderDetail::Where('order_id',$id)->get();

        if($orderdetails)
        {
            //Cập nhật lại số lượng sản phẩm
            foreach($orderdetails as $item)
            {
                $product = Product::find($item->product_id);
                $product->quanty = $product->quanty + $item->quantity;
                $product->save(); 
            }
        }
        $order->status = Order::STATUS_CANCEL;
        $order->save();
        return redirect()->back()->with([
            'level' => 'success',
            'message' => 'Huỷ đơn hàng thành công!'
        ]);
    }

}
