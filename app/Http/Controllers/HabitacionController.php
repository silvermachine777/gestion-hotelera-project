<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Gate;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', 'habitaciones.index');

        $habitacion = Habitacion::orderBy('id', 'Desc')->paginate(4);
        return view('habitaciones.index')->with('habitacion', $habitacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'habitaciones.create');

        $typeRoom = Categoria::all(['id', 'nombre'])->pluck('nombre', 'id');

        return view('habitaciones.create')->with('typeRoom', $typeRoom);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess', 'habitaciones.create');

        $room = Habitacion::create($request->all());        

        $room->save();

        $room->categorias()->associate($room);        
        
        Flash::success("La " . $room->descripcion . " se ha registrado de forma exitosa");

        return redirect('habitaciones');   

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show(Habitacion $habitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('haveaccess', 'habitaciones.edit');

        $typeRoom = Categoria::get()
        ->pluck('nombre');

        $habitacion = Habitacion::find($id);

        return view('habitaciones.edit')
                ->with('habitacion', $habitacion)
                ->with('typeRoom', $typeRoom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('haveaccess', 'habitaciones.update');

        $room = Habitacion::find($id);

        $room->descripcion = $request->descripcion;
        $room->numero_habitacion = $request->numero_habitacion;
        $room->piso = $request->piso;
        $room->categoria_id = $request->categoria_id;

        $room->save();

        Flash::warning("La " . $room->descripcion . " se ha actualizado de forma exitosa");

        return redirect('habitaciones');        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('haveaccess', 'habitaciones.destroy');
        
        $room = Habitacion::find($id);

        $room->delete();

        Flash::error("La " . $room->descripcion . " se ha eliminado de forma exitosa");

        return redirect('habitaciones');   
    }
}
