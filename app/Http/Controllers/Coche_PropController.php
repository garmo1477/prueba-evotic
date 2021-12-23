<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Propietario;
use Illuminate\Http\Request;

class Coche_PropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coches = Coche::all();
        return view('listadoCoches', compact('coches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coche = new Coche();
        $propietarios = Propietario::all();
        return view('crearCoche', compact('coche', 'propietarios'));
    }

    public function buscar_coches_propis(Request $request)
    {        
        if ($request->ajax()) {
            $id_seleccionado = $request->propietario_id;            
            $coches_propi = Coche::where('propietario_id', '=', $id_seleccionado)->get();            
           
            if($coches_propi){
                foreach($coches_propi as $coches){
                    echo '<tr>'.
                    '<td>'.$coches->propietario_id.'</td>'.
                    '<td>'.$coches->modelo.'</td>'.
                    '<td>'.$coches->marca.'</td>'.
                    '<td>'.$coches->color.'</td>'.
                    '<td>'.$coches->caballos.'</td>'.
                    '</tr>';                   
                }                
            }           
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coche = $request->all();
        Coche::create($coche);
        return redirect()->route('index')->with('status', 'Coche añadido con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coches  $coches
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coche)
    {
        //
    }
}
