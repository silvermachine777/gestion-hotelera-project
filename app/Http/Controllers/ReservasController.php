<?php

namespace App\Http\Controllers;

use App\Reservas;
use App\Categoria;
use App\Habitacion;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Gate;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess', 'reservas.index');

        $reserva = Reservas::select('reservas.*','habitacions.numero_habitacion')
        ->join('habitacions', 'reservas.id', '=', 'habitacions.id')
        ->get();
        
        return view('reservas.index')
        ->with('reserva', $reserva);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'reservas.create');

        $typeCategory = Categoria::all(['id', 'nombre'])->pluck('nombre', 'id');
        $typeRoom = Habitacion::all(['id', 'numero_habitacion'])->pluck('numero_habitacion', 'id');
        

        return view('reservas.create')
        ->with('typeCategory', $typeCategory)
        ->with('typeRoom', $typeRoom);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess', 'reservas.create');

        $reserva = Reservas::create($request->all());

        $reserva->save();

        $reserva->getCategory()->associate($reserva);
        $reserva->getRoom()->associate($reserva);

        Flash::success("La reserva se ha registrado de forma exitosa");

        return redirect('reservas');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show(Reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('haveaccess', 'reservas.edit');

        $reserva = Reservas::select('reservas.*','habitacions.id','categorias.id')
        ->join('habitacions', 'reservas.id', '=', 'habitacions.id')
        ->join('categorias', 'reservas.id', '=', 'categorias.id')
        ->where('reservas.id', $id)
        ->first();

        $categories = Categoria::get()
        ->pluck('nombre');

        $typeRoom = Habitacion::get()
        ->pluck('numero_habitacion');

        // $reserva = Reservas::find($id);

        

        // dd($reserva);

        return view('reservas.edit')
        ->with('reserva', $reserva)
        ->with('categories', $categories)
        ->with('typeRoom', $typeRoom);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('haveaccess', 'reservas.edit');

        $reserva = Reservas::find($id);

        $reserva->fecha_ingreso = $request->fecha_ingreso;
        $reserva->fecha_salida =  $request->fecha_salida;
        $reserva->cantidad_personas = $request->cantidad_personas;
        $reserva->categoria_id =  $request->categoria_id;
        $reserva->habitacion_id = $request->habitacion_id;

        $reserva->save();

        Flash::success("La reserva se ha actualizado de forma exitosa");

        return redirect('reservas'); 

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('haveaccess', 'reservas.destroy');

        $reserva = Reservas::find($id);
        $reserva->delete();
        
        Flash::success("La reserva se ha eliminado de forma exitosa");

        return redirect('reservas'); 
    }
}
