<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categoria::orderBy('id', 'Asc')->paginate(4);
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Categoria::create($request->all());

        $categories->save();

        Flash::success("La categoria  " . $categories->nombre . " se ha registrado de forma exitosa");

        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categoria::find($id);
        return view('category.edit')->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categoria::find($id);

        $categories->nombre = $request->nombre;
        $categories->precio = $request->precio;

        $categories->save();        

        Flash::success("La categoria  " . $categories->nombre . " se ha modificado de forma exitosa");

        return redirect('category');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categoria::find($id);
        $categories->delete();

        Flash::success("La categoria  " . $categories->nombre . " se ha eliminado de forma exitosa");

        return redirect('category');
    }
}
