<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\baja;

class BajaController extends Controller
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
        $bajas = baja::where('usuario', $usuarioEmail)
        ->paginate(2);
        return view('bajas.index',compact('bajas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bajas.create');
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
            'vaca_id' => 'required|max:255',
            'arete_vaca' => 'required|max:255',
            'nombre' => 'required|max:255',
            'lote' => 'required|max:255',
            'raza' => 'required|max:255',
            'origen' => 'required|max:255',
            'fecha_inc' => 'required|date',
            'fecha_nac' => 'required|date',
            'edad' => 'required|numeric',
            'fecha_baja' => 'required|date',
            'motivo' => 'required|max:255',
            'usuario' => 'required|email',
        ]);
        $baja = Baja::create($validatedData);
        return redirect('/bajas')->with('success', 'Baja creada');
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
        $baja = baja::findOrFail($id);
        return view('bajas.edit', compact('baja'));
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
            'vaca_id' => 'required|max:255',
            'arete_vaca' => 'required|max:255',
            'nombre' => 'required|max:255',
            'lote' => 'required|max:255',
            'raza' => 'required|max:255',
            'origen' => 'required|max:255',
            'fecha_inc' => 'required|date',
            'fecha_nac' => 'required|date',
            'edad' => 'required|numeric',
            'fecha_baja' => 'required|date',
            'motivo' => 'required|max:255',
            'usuario' => 'required|email',
        ]);
        baja::whereId($id)->update($validatedData);
        return redirect('/bajas')->with('success', 'La baja se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baja = baja::findOrFail($id);
        $baja->delete();
        return redirect('/bajas')->with('success', 'La baja se elimino correctamente');
    }
}
