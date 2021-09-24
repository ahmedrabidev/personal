<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->can('page users')){
            abort(403);
        }
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->can('create_page users')){
            abort(403);
        }
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('add users')){
            abort(403);
        }
        $this->validate($request,[
            'name' => ['required', 'string', 'min:5','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'roles' => 'required',
        ],
        [
            'password.min'=>trans('register.MIN_PASSWORD'),
            'password.confirmed'=>trans('register.CONFIRM_PASSWORD'),
            'name.min'=>trans('register.Min_NAME'),
            'email.required'=>trans('register.REQUIRED_EMAIL'),
            'email.unique'=>trans('auth.email_exist'),
            'roles.required' => trans('input.roles_required'),
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' =>  Hash::make($request->password),
        ]);
        $user->assignRole($request->roles);
        toastr()->success(trans('table.added_success'));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::user()->can('edit_page users')){
            abort(403);
        }
        $user          = User::find($id);
        $roles_all     = Role::all();
        $roles_checked = $user->getRoleNames()->toArray();
        return view('users.update',compact('user','roles_all','roles_checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!Auth::user()->can('update users')){
            abort(403);
        }
        $this->validate($request,[
            'name' => ['required', 'string', 'min:5','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'roles' => 'required',
        ],
            [
                'password.min'=>trans('register.MIN_PASSWORD'),
                'password.confirmed'=>trans('register.CONFIRM_PASSWORD'),
                'name.min'=>trans('register.Min_NAME'),
                'email.required'=>trans('register.REQUIRED_EMAIL'),
                'email.unique'=>trans('auth.email_exist'),
                'roles.required' => trans('input.roles_required'),
            ]);
        $user = User::find($request->id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' =>  Hash::make($request->password),
        ]);
        $roles_user = $user->getRoleNames()->toArray();
        foreach ($roles_user as $role)
        {
            $user->removeRole($role);
        }
        $user->assignRole($request->roles);
        toastr()->success(trans('table.added_success'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!Auth::user()->can('delete users')){
            abort(403);
        }
        User::find($request->id)->delete();
        toastr()->success(trans('table.deleted_success'));
        return redirect()->back();
    }

    public function add_permission($id){
        if(!Auth::user()->can('direct_permission_page users')){
            abort(403);
        }
        $user               = User::find($id);
        $user_roles         = $user->getRoleNames()->toArray();
        $direct_permissions = $user->getDirectPermissions()->pluck('name')->toArray();
        $permissions        = Permission::all();
        return view('users.add-permission',compact('user','user_roles','direct_permissions','permissions'));
    }

    public function saveDirectPermission(Request $request){
        if(!Auth::user()->can('save_direct_permission users')){
            abort(403);
        }
        $user = User::find($request->id);
        $direct_permissions = $user->getDirectPermissions()->pluck('name')->toArray();
        if($request->permission)
        {
            $user->givePermissionTo($request->permission);
        }
        else
        {
            $user->revokePermissionTo($direct_permissions);
        }
        toastr()->success(trans('table.added_success'));
        return redirect()->back();
    }
}
