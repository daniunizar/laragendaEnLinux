<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['contactos']=Contacto::all(); //Recuperamos todos los registros de la tabla contactos
        return view('contacto.index', $datos); //Esos registros los mandamos a la vista contacto.index en la variable $datos (una array de objetos Contacto)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosContacto = request()->except('_token', '_method'); //Recuperamos TODO lo que llega del formulario EXCEPTO _token y _method
        Contacto::insert($datosContacto);
        //return response()->json($datosContacto);
        //return $this->index();
        return redirect('contacto')->with('mensaje', "Contacto agregado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);
        return view('contacto.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosContacto = request()->except('_token', '_method'); //Recuperamos TODO lo que llega del formulario EXCEPTO _token y _method
        Contacto::where('id', '=', $id)->update($datosContacto);
        //return $this->index();//Esto vuelve al index pero mantiene en la url la id del contacto modificado, no sé por qué. Por eso usamos la de abajo
        return redirect('contacto')->with('mensaje', "Contacto modificado con éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contacto::destroy($id);
        return redirect('contacto')->with('mensaje', "Contacto eliminado con éxito");
    }
}
