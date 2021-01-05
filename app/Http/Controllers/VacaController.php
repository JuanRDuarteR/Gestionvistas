<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vaca;

class VacaController extends Controller
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
    public function index(Request $request) //Agregar el request para la busqueda
    {
        $usuarioEmail = auth()->user()->email;
        $vacas = vaca::where('usuario', $usuarioEmail)
        ->Search($request->nombre)
        ->paginate(2);
        return view('vacas.index',compact('vacas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacas.create');
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
            'arete' => 'required|max:255',
            'nombre' => 'required|max:255',
            'lote' => 'required|max:255',
            'raza' => 'required|max:255',
            'origen' => 'required|max:255',
            'fecha_inc' => 'required|date',
            'fecha_nac' => 'required|date',
            'edad' => 'required|numeric',
            'estatus' => 'required|max:255',
            'usuario' =>'required|email',
        ]);
       
        $vaca = Vaca::create($validatedData);
   
        return redirect('/vacas')->with('success', 'El animal se guardo correctamente');
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
        $vaca = Vaca::findOrFail($id);

        return view('vacas.edit', compact('vaca'));
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
            'nombre' => 'required|max:255',
            'lote' => 'required|max:255',
            'raza' => 'required|max:255',
            'origen' => 'required|max:255',
            'fecha_inc' => 'required|date',
            'fecha_nac' => 'required|date',
            'edad' => 'required|numeric',
            'estatus' => 'required|max:255',
        ]);
        Vaca::whereId($id)->update($validatedData);

        return redirect('/vacas')->with('success', 'El animal se actualizo correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaca = Vaca::findOrFail($id);
        $vaca->delete();
        return redirect('/vacas')->with('success', 'El animal se elimino correctamente');
    }
}