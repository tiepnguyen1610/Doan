<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBlogRequest;
use App\Traits\StorageImageTrait;
use App\Blog;
use App\Tag;
use App\BlogTag;
use DB,Log;

class BlogController extends Controller
{
    use StorageImageTrait;
    private $blog;
    private $tag;
    private $blog_tag;
    public function __construct(Blog $blog, Tag $tag, BlogTag $blog_tag)
    {
        $this->blog = $blog;
        $this->tag = $tag;
        $this->blog_tag = $blog_tag;
    }

    public function index()
    {
        $blogs = $this->blog->latest()->paginate(10);
    	return view('backend.admin.blogs.list', compact('blogs'));
    }

    public function create()
    {
    	return view('backend.admin.blogs.add');
    }

    public function store(AddBlogRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataInsert = [
                'title' => $request->txtTitle,
                'description' => $request->txtDescription,
                'content' => $request->txtContent,
                'user_id'=> auth()->id()
            ];

            $dataImageBlog = $this->storageTraitUpload($request, 'imageBlog', 'blog');
            if(!empty($dataImageBlog)) {
                $dataInsert['image_name'] = $dataImageBlog['file_name'];
                $dataInsert['image_path'] = $dataImageBlog['file_path'];
            }
            $blog = $this->blog->create($dataInsert);
            //Insert Tag for Blog
            if(!empty($request->tags)) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['tag_name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $blog->tags()->attach($tagIds);

            DB::commit();
            return redirect()->route('blogs.index')
                ->with([
                    'level' => 'success',
                    'message' => 'Thêm mới thành công'
                ]);
        }catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());  
        }
        
    }

    public function edit($id)
    {
        $blog = $this->blog->find($id);
    	return view('backend.admin.blogs.edit',compact('blog'));
    }

    public function update(Request $request, $id)
    {
    	try {
            DB::beginTransaction();
            $dataUpdate = [
                'title' => $request->txtTitle,
                'description' => $request->txtDescription,
                'content' => $request->txtContent,
                'user_id'=> auth()->id()
            ];

            $dataImageBlogUpdate = $this->storageTraitUpload($request, 'imageBlog', 'blog');
            if(!empty($dataImageBlogUpdate)) {
                $dataUpdate['image_name'] = $dataImageBlogUpdate['file_name'];
                $dataUpdate['image_path'] = $dataImageBlogUpdate['file_path'];
            }

            $this->blog->find($id)->update($dataUpdate);
            $blog = $this->blog->find($id);
            //Update Tag for Blog
            if(!empty($request->tags)) {
                foreach($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['tag_name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $blog->tags()->sync($tagIds);
            
            DB::commit();
            return redirect()->route('blogs.index')
                ->with([
                    'level' => 'success',
                    'message' => 'Cập nhật thành công'
                ]);
        }catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());  
        }
    }
    
    public function destroy($id)
    {
        try{

            $this->blog->find($id)->delete();
            $this->blog_tag->where('blog_id', $id)->delete();
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
