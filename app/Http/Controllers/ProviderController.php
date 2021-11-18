<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProviderRequest;
use App\Provider;
use log;

class ProviderController extends Controller
{
	private $provider;

	public function __construct(Provider $provider)
	{
		$this->provider = $provider;
	}
    
    public function index()
    {
        $providers = $this->provider->paginate(5);
    	return view('backend.admin.providers.list', compact('providers'));
    }

    public function create()
    {
        return view('backend.admin.providers.add');
    }

    public function store(AddProviderRequest $request)
    {
        $this->provider->create([
            'name'=> $request->txtName,
            'address'=> $request->txtAddress,
            'phone'=> $request->txtPhone
        ]);

        return redirect()->route('providers.index')
            ->with([
                'level'=> 'success',
                'message'=> 'Thêm mới thành công!!'
            ]);
    }

    public function edit($id)
    {
        $provider = $this->provider->find($id);
        return view('backend.admin.providers.edit', compact('provider'));
    }

    public function update(Request $request, $id)
    {
        $this->provider->find($id)->update([
            'name'=> $request->txtName,
            'address'=> $request->txtAddress,
            'phone'=> $request->txtPhone
        ]);

        return redirect()->route('providers.index')
            ->with([
                'level' => 'success',
                'message' => 'Cập nhật thành công+!'
            ]);
    }

    public function destroy($id)
    {
        try {

            $this->provider->find($id)->delete();
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
