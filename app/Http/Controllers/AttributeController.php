<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Size;
use Log;

class AttributeController extends Controller
{
    public function index()
    {
        $colors = Color::oldest()->paginate(5);
        $sizes = Size::oldest()->paginate(5);
    	return view('backend.admin.attributes.listattribute', compact('colors','sizes'));
    }

    public function getColor()
    {
    	return view('backend.admin.attributes.addColor');
    }

    public function postColor(Request $request)
    {
    	Color::create([
    		'color' => $request->txtColor,
            'name'  => $request->txtName
    	]);
        return redirect()->route('attributes.color.create')
            ->with([
                'level' => 'success',
                'message' => 'Thêm mới thành công!'
            ]);
    }

    public function getEditColor($id)
    {
        $color = Color::find($id);
        return view('backend.admin.attributes.editColor', compact('color'));
    }

     public function postEditColor(Request $request, $id)
    {
        Color::find($id)->update([
            'color' => $request->txtColor,
            'name'  => $request->txtName
        ]);
        return redirect()->route('attributes.index')
            ->with([
                'level' => 'success',
                'message' => 'Cập nhật thành công!'
            ]);
    }

    public function destroyColor($id)
    {
        try {

            Color::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);

        } catch(\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }

    }

    public function getSize()
    {
    	return view('backend.admin.attributes.addSize');
    }

    public function postSize(Request $request)
    {
        Size::create([
            'size' => $request->txtSize
        ]);
        return redirect()->back()
            ->with([
                'level' => 'success',
                'message' => 'Thêm mới thành công!' 
            ]);
    }

    public function getEditSize($id)
    {
        $size = Size::find($id);
        return view('backend.admin.attributes.editSize', compact('size'));
    }

    public function postEditSize(Request $request, $id)
    {
        Size::find($id)->update([
            'size' => $request->txtSize
        ]);

        return redirect()->route('attributes.index')
            ->with([
                'level' => 'success',
                'message' => 'Cập nhật thành công!' 
            ]);
    }

    public function destroySize($id)
    {
        try {

            Size::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);

        } catch(\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }

    }

}
