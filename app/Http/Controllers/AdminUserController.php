<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB,Log;
use App\User;
use App\Role;
use App\RoleUser;

class AdminUserController extends Controller
{
	private $user;
	private $role;
	private $role_user;
    
	public function __construct(User $user, Role $role, RoleUser $role_user)
	{
		$this->user = $user;
		$this->role = $role;
        $this->role_user = $role_user;
	}

    public function index()
    {
    	$users = $this->user->all();
    	return view('backend.admin.users.list', compact('users'));
    }

    public function create()
    {
    	$roles = $this->role->all();
    	return view('backend.admin.users.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'username' => $request->txtUsername,
                'email' => $request->txtEmail,
                'password' => Hash::make($request->txtPassword)
            ]);
        
            $user->roles()->attach($request->sltRoleId);
            DB::commit();

            return redirect()->route('users.index')->with([
                'level' => 'success',
                'message' => 'Thêm mới thành công!'
            ]);
        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());
        }
        
    }

    public function edit($id)
    {
        $user  = $this->user->find($id);
        $roles = $this->role->all();
        $rolesOfUser = $user->roles;
        //dd($roleOfUser);
        return view('backend.admin.users.edit', compact('user', 'roles', 'rolesOfUser'));
    }

    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'username' => $request->txtUsername,
                'email' => $request->txtEmail,
                'password' => Hash::make($request->txtPassword)
            ]);
            
            $user = $this->user->find($id);
            $user->roles()->sync($request->sltRoleId);
            DB::commit();

            return redirect()->route('users.index')->with([
                'level' => 'success',
                'message' => 'Cập nhật thành công!!!'
            ]);
        }catch(\Exception $exception){

            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage());
        }
        
    }

    public function destroy($id)
    {
        try{

            $this->user->find($id)->delete();
            $this->role_user->where('user_id', $id)->delete();
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
