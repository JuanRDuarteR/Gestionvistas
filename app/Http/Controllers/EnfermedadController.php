<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\enfermedad;

class EnfermedadController extends Controller
{
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
        $enfermedades = enfermedad::where('usuario', $usuarioEmail)
        ->paginate(2);
        return view('enfermedades.index',compact('enfermedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfermedades.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ////arete_vaca','fecha','enfermedad', 'tratamiento', 'encargado','estado','usuario'
        $validatedData = $request->validate([
            'arete_vaca' => 'required|max:255',
            'fecha' => 'required|date',
            'enfermedad' => 'required|max:255',
            'tratamiento' => 'required|max:255',
            'encargado' => 'required|max:255',
            'estado' => 'required|max:255',
            'usuario' =>'required|email',
        ]);
       
        $enfermedad = enfermedad::create($validatedData);
   
        return redirect('/enfermedades')->with('success', 'La enfermedad quedo registrada con exito');
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
        $enfermedad = enfermedad::findOrFail($id);
        return view('enfermedades.edit', compact('enfermedad'));
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
            'arete_vaca' => 'required|max:255',
            'fecha' => 'required|date',
            'enfermedad' => 'required|max:255',
            'tratamiento' => 'required|max:255',
            'encargado' => 'required|max:255',
            'estado' => 'required|max:255',
        ]);
        enfermedad::whereId($id)->update($validatedData);
        return redirect('/enfermedades')->with('success', 'La enfermedad se edito correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedad = enfermedad::findOrFail($id);
        $enfermedad->delete();
        return redirect('/enfermedades')->with('success', 'La enfermedad se elimino correctamente');
    }
}
