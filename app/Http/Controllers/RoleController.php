<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Gate; 

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', 'role.index');

        $roles = Role::orderBy('id', 'ASC')->paginate(4);
        return view('role.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'role.create');

        $permissions = Permission::get();
        return view('role.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess', 'role.create');

        $role = Role::create($request->all());

        if($request->get('permission')){
            $role->permissions()->sync($request->get('permission'));
        }
        
        Flash::success("El rol " . $role->name . " se ha registrado de forma exitosa");

        return redirect('role');
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
    public function edit(Role $role)
    {
        Gate::authorize('haveaccess', 'role.edit');

        $permissionRole = [];
        foreach($role->permissions as $permission){
            $permissionRole[]=$permission->id;
        }
        
        $permissions = Permission::get();

        return view('role.edit', compact('permissions', 'role', 'permissionRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('haveaccess', 'role.edit');

        $role->update($request->all());

        if($request->get('permission')){
            $role->permissions()->sync($request->get('permission'));
        }
        
        Flash::success("El rol " . $role->name . " se ha actualizado de forma exitosa");

        return redirect('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('haveaccess', 'role.destroy');

        $role->delete();

        Flash::success("El rol " . $role->name . " se ha eliminado de forma exitosa");

        return redirect('role');
    }
}
