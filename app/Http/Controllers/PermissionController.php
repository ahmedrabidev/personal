<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$role = Role::find(1);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);*/

        if(!Auth::user()->can('page permissions')){
            abort(403);
        }
        $permissions = Permission::all();
        return view('permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('new permission')){
            abort(403);
        }
        $this->validate($request, [
            'name' => 'required',
            'trans_ar' => 'required',
            'trans_en' => 'required',
        ]);
        $permission = Permission::create([
            'name'  => $request->name,
            'trans' =>  ['en' => $request->trans_en, 'ar' => $request->trans_ar],
        ]);
        $role = Role::where('name','owner')->first();
        $role->givePermissionTo($permission->name);
        toastr()->success(trans('table.added_success'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(permission $permission)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!Auth::user()->can('update permission')){
            abort(403);
        }
        $this->validate($request, [
            'name' => 'required',
            'trans_ar' => 'required',
            'trans_en' => 'required',
        ]);
        Permission::find($request->id)->update([
            'trans' =>  ['en' => $request->trans_en, 'ar' => $request->trans_ar],
        ]);
        toastr()->success(trans('table.added_success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!Auth::user()->can('delete permission')){
            abort(403);
        }
        Permission::find($request->id)->delete();
        toastr()->success(trans('table.deleted_success'));
        return redirect()->back();
    }
}
