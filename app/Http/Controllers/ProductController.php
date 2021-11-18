<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use App\Http\Requests\AddProductRequest;
use App\Category;
use App\Product;
use App\ImageDetail;
use App\Provider;
use App\Color;
use App\ColorProduct;
use App\SizeProduct;
use App\Size;
use DB,Log;

class ProductController extends Controller
{
    use StorageImageTrait;
	private $category;
    private $product;
    private $imagedetail;

	public function __construct(Category $category, Product $product, ImageDetail $imagedetail)
	{
		$this->category = $category;
        $this->product = $product;
        $this->imagedetail = $imagedetail;
	}

	public function getCategory($parentId)
    {
    	$data = $this->category->all();
    	$recusive = new Recusive($data);
    	$htmlOption = $recusive->categoryRecusive($parentId);
    	return $htmlOption;
    }

    public function index()
    {
    	$products = $this->product->get();
    	return view('backend.admin.products.list',compact('products'));
    }

    public function create()
    {
    	$htmlOption = $this->getCategory($parentId = '');
    	$providers = Provider::all();
        $colors = Color::all();
        $sizes = Size::all();
    	return view('backend.admin.products.add', compact('htmlOption','providers','colors','sizes'));
    }

    public function store(AddProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProduct = [
                'pro_name'=> $request->txtProname,
                'cat_id'=> $request->slrCategory,
                'provider_id'=> $request->slrProvider,
                'quanty'=> $request->txtQuanty,
                'sale_price'=> $request->txtSalePrice,
                'promotional_price'=> $request->txtPromotionPrice,
                'description'=> $request->txtDescription,
                'content'=> $request->txtContent,
                'user_id'=> auth()->id()
            ];

            $dataUploadImage = $this->storageTraitUpload($request, 'imagePro', 'product');
            if(!empty($dataUploadImage)) {
                $dataProduct['image_name'] = $dataUploadImage['file_name'];
                $dataProduct['image_path'] = $dataUploadImage['file_path'];
            }
            $product = $this->product->create($dataProduct);

            //Insert data to image_details
            if($request->hasFile('imageDetail')) {
                foreach($request->imageDetail as $fileitem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileitem, 'product');
                    $product->images()->create([
                        'image_detail_name' => $dataProductImageDetail['file_name'],
                        'image_detail_path' => $dataProductImageDetail['file_path']
                    ]);
                }
            }

            //Insert data to color_products
            $product->productcolors()->attach($request->chbColor);
       
            //Insert data to size_products
            $product->productsizes()->attach($request->chbSize);
            DB::commit();
            return redirect()->back()
                ->with([
                    'level' => 'success',
                    'message' => 'Thêm mới thành công'
                ]);
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());
        }
        
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $providers = Provider::all();
        $colors = Color::all();
        $sizes = Size::all();
        $color_product = $product->productcolors;
        $size_product = $product->productsizes;
        $htmlOption = $this->getCategory($product->cat_id);
        return view('backend.admin.products.edit',compact('product','htmlOption','providers','colors','sizes','color_product','size_product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'pro_name'=> $request->txtProname,
                'cat_id'=> $request->slrCategory,
                'provider_id'=> $request->slrProvider,
                'quanty'=> $request->txtQuanty,
                'sale_price'=> $request->txtSalePrice,
                'promotional_price'=> $request->txtPromotionPrice,
                'description'=> $request->txtDescription,
                'content'=> $request->txtContent,
                'user_id'=> auth()->id()
            ];

            $dataUploadImage = $this->storageTraitUpload($request, 'imagePro', 'product');
            if(!empty($dataUploadImage)) {
                $dataProductUpdate['image_name'] = $dataUploadImage['file_name'];
                $dataProductUpdate['image_path'] = $dataUploadImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);

            $product = $this->product->find($id);

            //Update data to image_details
            if($request->hasFile('imageDetail')) {
                $this->imagedetail->where('product_id', $id)->delete();
                foreach($request->imageDetail as $fileitem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileitem, 'product');
                    $product->images()->create([
                        'image_detail_name' => $dataProductImageDetail['file_name'],
                        'image_detail_path' => $dataProductImageDetail['file_path']
                    ]);
                }
            }

            //update data to color_products
            $product->productcolors()->sync($request->chbColor);
            
            //Update data to size_products
            $product->productsizes()->sync($request->chbSize);
            DB::commit();
            return redirect()->route('products.index')
                ->with([
                    'level' => 'success',
                    'message' => 'Cập nhật thành công'
                ]);
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            
            $this->product->find($id)->delete();
            $this->imagedetail->where('product_id',$id)->delete();
            ColorProduct::where('product_id',$id)->delete();
            SizeProduct::where('product_id',$id)->delete();
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
