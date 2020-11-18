<?php

namespace App\Http\Controllers;

use App\Reservas;
use App\Categoria;
use App\Habitacion;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserva = Reservas::orderBy('id', 'Desc')->paginate(4);
        
        return view('reservas.index')->with('reserva', $reserva);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeCategory = Categoria::all(['id', 'nombre'])->pluck('nombre', 'id');
        $typeRoom = Habitacion::all(['id', 'numero_habitacion'])->pluck('numero_habitacion', 'id');
        // $typeRoomFloor = Habitacion::all(['id', 'piso'])->pluck('piso', 'id');
        

        return view('reservas.create')
        ->with('typeCategory', $typeCategory)
        ->with('typeRoom', $typeRoom);
        // ->with('typeRoomFloor', $typeRoomFloor);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = Reservas::create($request->all());

        $reserva->save();

        $reserva->getCategory()->associate($reserva);
        $reserva->getRoom()->associate($reserva);

        Flash::success("La se ha registrado de forma exitosa");

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
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservas $reservas)
    {
        //
    }
}
