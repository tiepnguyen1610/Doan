<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Log;
use App\Components\RecusivePermission;

class PermissionController extends Controller
{
	private $permission;

	public function __construct(Permission $permission)
	{
		$this->permission = $permission;
	}

	public function getPermission($parentId)
    {
    	$data = $this->permission->all();
    	$recusive = new RecusivePermission($data);
    	$htmlOption = $recusive->permissionRecusive($parentId);
    	return $htmlOption;
    }

    public function index()
    {
    	$permissions = $this->permission->where('parent_id', 0)->get();
        $permissionsChild = $this->permission->where('parent_id','<>',0)->paginate(10);
    	return view('backend.admin.permissions.list', compact('permissions','permissionsChild'));
    }
    public function create()
    {
    	$htmlOption = $this->getPermission($parentId = '');
    	return view('backend.admin.permissions.add',compact('htmlOption'));
    }

    public function store(Request $request)
    {
    	$this->permission->create([
    		'permission_name' => $request->txtPermissionName,
    		'display_name'	=> $request->txtDescription,
            'key_code'  => trim($request->txtKey),
    		'parent_id'=> $request->slrParent
    	]);

    	return redirect()->route('permissions.create')
				->with([
    				'level'=>'success',
                	'message' => 'Thêm mới thành công'							
				]);
    }

    public function edit($id)
    {
    	$permission = $this->permission->find($id);
    	$htmlOption = $this->getPermission($permission->parent_id);
    	return view('backend.admin.permissions.edit', compact('permission', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
    	$this->permission->find($id)->update([
    		'permission_name' => $request->txtPermissionName,
    		'display_name'	=> $request->txtDescription,
            'key_code'  => trim($request->txtKey),
    		'parent_id'=> $request->slrParent
    	]);

    	return redirect()->route('permissions.index')
				->with([
    				'level'=>'success',
                	'message' => 'Cập nhật thành công!+'							
				]);
    }

    public function destroy($id)
    {
    	try{

            $this->permission->find($id)->delete();
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
