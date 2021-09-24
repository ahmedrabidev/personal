<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->can('page roles')){
            abort(403);
        }
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->can('create_page roles')){
            abort(403);
        }
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('add roles')){
            abort(403);
        }
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ],
        [
            'name.required' => trans('input.name_required'),
            'name.unique' => trans('input.user_type_exist'),
            'permission.required' => trans('input.permission_required'),
        ]);
        $role =Role::create(['name'=>$request->name]);
        $role->syncPermissions($request->permission);
        toastr()->success(trans('table.added_success'));
        return redirect()->route('roles.index');
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
        if(!Auth::user()->can('edit_page roles')){
            abort(403);
        }
        if($id)
        {
            $role = Role::find($id);
            $permissions_checked = $role->getAllPermissions()->pluck('name')->toArray();
            $permissions_all = Permission::all();
            return view('roles.update',compact('role','permissions_all','permissions_checked'));
        }
        return view('404');
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
        if(!Auth::user()->can('update roles')){
            abort(403);
        }
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$request->id,
            'permission' => 'required',
        ],
            [
                'name.required' => trans('input.name_required'),
                'name.unique' => trans('input.user_type_exist'),
                'permission.required' => trans('input.permission_required'),
            ]);

        $role =Role::find($request->id);
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permission);
        toastr()->success(trans('table.added_success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!Auth::user()->can('delete roles')){
            abort(403);
        }
        Role::find($request->id)->delete();
        toastr()->success(trans('table.deleted_success'));
        return redirect()->back();
    }
}
