<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Muestra;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class MuestraController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $muestra = Muestra::all();

        return view('backEnd.muestra.index', compact('muestra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.muestra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        		'nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/', 
        		'descripcion' => 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\-\,\s]+$/'
        ]);
        Muestra::create($request->all());

        Session::flash('message', 'La Muestra se almaceno satisfactoriamente!');
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
    public function show($id)
    {
        $muestra = Muestra::findOrFail($id);

        return view('backEnd.muestra.show', compact('muestra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $muestra = Muestra::findOrFail($id);

        return view('backEnd.muestra.edit', compact('muestra'));
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
        $this->validate($request, [
        		'nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'descripcion' => 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\-\,\s]+$/'
        ]);

        $muestra = Muestra::findOrFail($id);
        $muestra->update($request->all());

        Session::flash('message', 'La Muestra se almaceno satisfactoriamente!');
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
    public function destroy($id)
    {
        $muestra = Muestra::findOrFail($id);

        $muestra->delete();

        Session::flash('message', 'La Muestra se elimino satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('muestra');
    }

}
