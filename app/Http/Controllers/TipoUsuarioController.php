<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoUsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipousuario = TipoUsuario::all();

        return view('backEnd.tipousuario.index', compact('tipousuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.tipousuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/']);

        TipoUsuario::create($request->all());

        Session::flash('message', 'El Tipo Usuario se almaceno satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('tipousuario');
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
        $tipousuario = TipoUsuario::findOrFail($id);

        return view('backEnd.tipousuario.show', compact('tipousuario'));
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
        $tipousuario = TipoUsuario::findOrFail($id);

        return view('backEnd.tipousuario.edit', compact('tipousuario'));
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
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/']);

        $tipousuario = TipoUsuario::findOrFail($id);
        $tipousuario->update($request->all());

        Session::flash('message', 'El Tipo Usuario se almaceno satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('tipousuario');
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
        $tipousuario = TipoUsuario::findOrFail($id);
        $tipousuario->delete();
        Session::flash('message', 'El Tipo Usuario se elimino satisfactoriamente!');
        Session::flash('status', 'success');
        return redirect('tipousuario');
    }

}
