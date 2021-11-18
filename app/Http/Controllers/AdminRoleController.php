<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\PermissionRole;
use Log;

class AdminRoleController extends Controller
{
	private $role;
    private $permission;
    private $per_role;

	public function __construct(Role $role, Permission $permission, PermissionRole $per_role)
	{
		$this->role = $role;
        $this->permission = $permission;
        $this->per_role = $per_role;
	}

    public function index()
    {
    	$roles = $this->role->paginate(10);
    	return view('backend.admin.roles.list', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        //dd($permissions);
    	return view('backend.admin.roles.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'role_name' =>$request->txtRole,
            'display_name'  =>$request->txtDescription
        ]);
        $role->permissions()->attach($request->chbPermission);

        return redirect()->route('roles.index')
            ->with([
                'level' => 'success',
                'message' => 'Thêm mới thành công!!!'
            ]);
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        $permissionsChecked = $role->permissions;
        //dd($permissionsChecked);
        return view('backend.admin.roles.edit', compact('permissionsParent', 'role', 'permissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        $this->role->find($id)->update([
            'role_name' =>$request->txtRole,
            'display_name'  =>$request->txtDescription
        ]);
        $role = $this->role->find($id);
        $role->permissions()->sync($request->chbPermission);
        return redirect()->route('roles.index')
            ->with([
                'level' => 'success',
                'message' => 'Cập nhật thành công!!!'
            ]);
    }

    public function destroy($id)
    {
        try{

            $this->role->find($id)->delete();
            $this->per_role->where('role_id', $id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }catch(\Exception $exception) {

            Log::error('Message: ' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    
}
