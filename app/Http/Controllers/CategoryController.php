<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Support\Str;
use App\Category;
use Log;
use App\Components\Recusive;

class CategoryController extends Controller
{
	private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

    public function index()
    {
    	$categories = $this->category->get();
        
    	return view('backend.admin.categories.list', compact('categories'));
    }

    public function create()
    {
    	$htmlOption = $this->getCategory($parentId = '');
    	return view('backend.admin.categories.add', compact('htmlOption'));
    }

    public function store(AddCategoryRequest $request)
    {
    	$this->category->create([
    		'cat_name'=> $request->txtCatname,
    		'parent_id'=> $request->slrParent,
    		'slug'=> Str::slug($request->txtCatname)
    	]);

    	return redirect()->route('categories.create')
				->with([
    				'level'=>'success',
                	'message' => 'Thêm mới thành công'							
				]);
    }

    public function getCategory($parentId)
    {
    	$data = $this->category->all();
    	$recusive = new Recusive($data);
    	$htmlOption = $recusive->categoryRecusive($parentId);
    	return $htmlOption;
    }

    public function edit($id)
    {
    	$category = $this->category->find($id);
    	$htmlOption = $this->getCategory($category->parent_id);
    	return view('backend.admin.categories.edit', compact('category','htmlOption'));
    }

    public function update(Request $request, $id)
    {
    	$this->category->find($id)->update([
    		'cat_name'=> $request->txtCatname,
    		'parent_id'=> $request->slrParent,
    		'slug'=> Str::slug($request->txtCatname)
    	]);
    	return redirect()->route('categories.index')
				->with([
    				'level'=>'success',
                	'message' => 'Cập nhật thành công+!'							
				]);
    }

    public function destroy($id)
    {
    	try {

            $this->category->find($id)->delete();
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
