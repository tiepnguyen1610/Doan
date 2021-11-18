<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use App\Slide;
use Log,DB;

class SlideController extends Controller
{
    use StorageImageTrait;
	private $slide;
	public function __construct(Slide $slide)
	{
		$this->slide = $slide;
	}

    public function index()
    {
        $slides = $this->slide->paginate(5);
    	return view('backend.admin.slides.list', compact('slides'));
    }

    public function create()
    {
    	return view('backend.admin.slides.add');
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $dataInsert = [
                'name' => $request->txtSlide,
                'description' => $request->txtDescription,
                'status' => $request->rdoStatus
            ];
            $dataImageSlide = $this->storageTraitUpload($request, 'imageSlide', 'slide');
            if(!empty($dataImageSlide)) {
                $dataInsert['slide_name'] = $dataImageSlide['file_name'];
                $dataInsert['slide_path'] = $dataImageSlide['file_path'];
            }
            $this->slide->create($dataInsert);
            DB::commit();

            return redirect()->route('slides.index');

        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());
        }
    	
    }

    public function edit($id)
    {
        $slide = $this->slide->find($id);
        return view('backend.admin.slides.edit',compact('slide'));
    }

    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $dataUpdate = [
                'name' => $request->txtSlide,
                'description' => $request->txtDescription,
                'status' => $request->rdoStatus
            ];
            $dataImageSlide = $this->storageTraitUpload($request, 'imageSlide', 'slide');
            if(!empty($dataImageSlide)) {
                $dataUpdate['slide_name'] = $dataImageSlide['file_name'];
                $dataUpdate['slide_path'] = $dataImageSlide['file_path'];
            }
            $this->slide->find($id)->update($dataUpdate);
            DB::commit();

            return redirect()->route('slides.index');

        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try{

            $this->slide->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);

        }catch(\Exception $exception){
            
            Log::error('Message: ' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }


}
