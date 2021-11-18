<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StatisticExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Order;
use App\Product;
use App\User;
use App\Blog;

class StatisticsController extends Controller
{
	public function index()
    {
        /**
         * Doanh thu theo ngày
         */
    	$totalDay = Order::whereDay('updated_at',date('d'))
    		->where('status', Order::STATUS_DONE)->sum('totalprice');
        /**
         * Doanh thu tháng
         */
    	$totalMonth = Order::whereMonth('updated_at',date('m'))
    		->where('status', Order::STATUS_DONE)->sum('totalprice');
        /**
         * Doanh thu theo năm
         */
    	$totalYear = Order::whereYear('updated_at',date('y'))
    		->get('status', Order::STATUS_DONE)->sum('totalprice');	
        return view('backend.admin.statistic.sale_statistic', compact('totalDay', 'totalMonth', 'totalYear'));
    }

    /**
     * Thống kê tồn kho
     * @return [type] [description]
     */
    public function wareHouseStatistic()
    {
        $wareHouseProducts = Product::Where('quanty','>', 5)->get();
    	return view('backend.admin.statistic.inventory',compact('wareHouseProducts'));
    }

    public function getDashBoard()
    {
        $users = User::all()->count();
        $products = Product::all()->count();
        $orders = Order::Where('status', 0)->count();
        $totalRevenue = Order::Where('status',1)->sum('totalprice');
        return view('backend.admin.statistic.dashboard', compact('users', 'products', 'orders', 'totalRevenue'));
    }

}
