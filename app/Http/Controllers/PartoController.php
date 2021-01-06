<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parto;

class PartoController extends Controller
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
        $partos = parto::where('usuario', $usuarioEmail)
        ->orderBy('fecha', 'ASC') 
        ->paginate(2);
        return view('partos.index',compact('partos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partos.create');
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
            'arete_vaca' => 'required|max:255',
            'fecha' => 'required|date',
            'peso' => 'required|max:255',
            'raza' => 'required|max:255',
            'encargado' => 'required|max:255',
            'estado' => 'required|max:255',
            'sexo' => 'required|max:255',
            'usuario' =>'required|email',
        ]);
       
        $parto = parto::create($validatedData);
   
        return redirect('/partos')->with('success', 'El parto se registro correctamente');
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
        $parto = parto::findOrFail($id);
        return view('partos.edit', compact('parto'));
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
            'peso' => 'required|max:255',
            'raza' => 'required|max:255',
            'encargado' => 'required|max:255',
            'estado' => 'required|max:255',
            'sexo' => 'required|max:255',
        ]);
        parto::whereId($id)->update($validatedData);
        return redirect('/partos')->with('success', 'El parto se edito correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parto = parto::findOrFail($id);
        $parto->delete();
        return redirect('/partos')->with('success', 'El parto se elimino correctamente');
    }
}
