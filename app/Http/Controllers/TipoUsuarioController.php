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
        $request->user()->authorizeRoles(['Administrador']);

        $tipousuario = TipoUsuario::all();

        return view('backEnd.tipousuario.index', compact('tipousuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('backEnd.tipousuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/']);

        TipoUsuario::create($request->all());

        Session::flash('message', 'El Tipo Usuario se almacenó satisfactoriamente!');
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
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador']);
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
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador']);
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
        $request->user()->authorizeRoles(['Administrador']);

        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/']);

        $tipousuario = TipoUsuario::findOrFail($id);
        $tipousuario->update($request->all());

        Session::flash('message', 'El Tipo Usuario se almacenó satisfactoriamente!');
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
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador']);
        
        $tipousuario = TipoUsuario::findOrFail($id);
        $tipousuario->delete();
        Session::flash('message', 'El Tipo Usuario se eliminó satisfactoriamente!');
        Session::flash('status', 'success');
        return redirect('tipousuario');
    }

}
