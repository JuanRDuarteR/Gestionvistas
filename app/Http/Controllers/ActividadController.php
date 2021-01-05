<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\actividad;

class ActividadController extends Controller
{

    //Este metodo sirve para proteger las rutas, que sea necesario el estar logueado

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioEmail = auth()->user()->email;
        $actividades = actividad::where('usuario', $usuarioEmail)
        ->orderBy('fecha', 'ASC') 
        ->paginate(2);
        return view('actividades.index',compact('actividades'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividades.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_act' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'lote_animal' => 'required|max:255',
            'fecha' => 'required|date',
            'encargado' => 'required|max:255',
            'producto' => 'required|max:255',
            'usuario' =>'required|email',
        ]);
        $actividad = Actividad::create($validatedData);
   
        return redirect('/actividades')->with('success', 'La actividad se registro correctamente');
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
        $actividades = Actividad::findOrFail($id);

        return view('actividades.edit', compact('actividades'));
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
        $validatedData = $request->validate([
            'nombre_act' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'lote_animal' => 'required|max:255',
            'fecha' => 'required|date',
            'encargado' => 'required|max:255',
            'producto' => 'required|max:255',
        ]);
        Actividad::whereId($id)->update($validatedData);

        return redirect('/actividades')->with('success', 'La actividad se edito correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();
        return redirect('/actividades')->with('success', 'La actividad se elimino correctamente');
    }
}
