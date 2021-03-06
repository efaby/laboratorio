<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Muestra;
use App\TipoExaman;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class MuestraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $muestra = Muestra::all();

        return view('backEnd.muestra.index', compact('muestra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);    
        $items= TipoExaman::pluck('nombre', 'id')->toArray();
        return view('backEnd.muestra.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $this->validate($request, [
        		'nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\s]+$/', 
                'tipoexamens_id' => 'required',
        		'descripcion' => 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\-\,\s]+$/'
        ]);
        Muestra::create($request->all());

        Session::flash('message', 'La Muestra se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('muestra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $muestra = Muestra::findOrFail($id);
        $items= TipoExaman::pluck('nombre', 'id')->toArray();
        return view('backEnd.muestra.show', compact('muestra','items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $muestra = Muestra::findOrFail($id);
        $items= TipoExaman::pluck('nombre', 'id')->toArray();
        return view('backEnd.muestra.edit', compact('muestra','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $this->validate($request, [
        		'nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\-\,\s]+$/',
                'tipoexamens_id' => 'required',
        		'descripcion' => 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\-\,\s]+$/'
        ]);

        $muestra = Muestra::findOrFail($id);
        $muestra->update($request->all());

        Session::flash('message', 'La Muestra se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('muestra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $muestra = Muestra::findOrFail($id);

        $muestra->delete();

        Session::flash('message', 'La Muestra se eliminó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('muestra');
    }

}
