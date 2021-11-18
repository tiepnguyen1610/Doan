<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Category;
use App\Contact;
use App\ImageDetail;
use DB;

class HomeController extends Controller
{
    public function index()
    {
    	$sliders = Slide::Where('status', 1)->get();
    	$categories = Category::where('parent_id', 0)->get();
    	$products = Product::latest()->take(5)->get();
    	$productsRecommend = Product::latest('views_count', 'DESC')->take(10)->get(); 
    	
    	return view('frontend.layouts.home', compact('sliders', 'products', 'productsRecommend', 'categories'));
    }

    public function productsType($slug, $id)
    {
    	$products = Product::Where('cat_id',$id)->latest()->paginate(9);
        $category = Category::Where('id',$products[0]->cat_id)->first();
        $menuCategory = Category::Where('parent_id',$category->parent_id)->get();
    	return view('frontend.pages.shopproduct', compact('products','menuCategory'));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        $images = ImageDetail::where('product_id', $product->id)->get();
        $categories = Category::where('parent_id', 0)->get();
        return view('frontend.pages.detailproduct', compact('product', 'categories', 'images'));
    }
    
    public function contact()
    {
        $contactInfo = Contact::first();
        $categories = Category::where('parent_id', 0)->get(); 
        return view('frontend.pages.contact',compact('contactInfo', 'categories'));
    }
    
}
