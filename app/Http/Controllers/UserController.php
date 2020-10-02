<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess','user.index');

        $users = User::with('roles')->orderBy('id', 'Desc')->paginate(4);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','user.create');

        $roles = Role::all(['id', 'name'])->pluck('name', 'id');

        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        Gate::authorize('haveaccess','user.create');
        
        $user = User::create($request->all());

        $user->password = bcrypt($request->password);
        
        $user->save();        

        $user->roles()->attach($request->get('roles'));       

        Flash::success("El usuario " . $user->name . " se ha registrado de forma exitosa");

        return redirect('admin/users');

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
        Gate::authorize('haveaccess','user.edit');

        $roles = Role::get()
        ->pluck('name');

        $user = User::find($id);

        return view('admin.users.edit')
            ->with('users', $user)
            ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('haveaccess','user.edit');

        $user = User::find($id);

        $user->cedula = $request->cedula;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->estado_usuario = $request->estado_usuario;
        $user->save();

        Flash::warning("El usuario " . $user->name . " fue editado correctamente");

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('haveaccess','user.destroy');

        $user = User::find($id);
        $user->delete();

        Flash::error("El usuario " . $user->name . " fue eliminado correctamente");

        return redirect('admin/users');

    }
}
