<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entidad;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class EntidadController extends Controller
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
        $entidades = Entidad::all();

        return view('backEnd.entidad.index', compact('entidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('backEnd.entidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/']);
        
        Entidad::create($request->all());

        Session::flash('message', 'La Entidad se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('entidad');
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

        $entidad = Entidad::findOrFail($id);

        return view('backEnd.entidad.show', compact('entidad'));
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
        $entidad = Entidad::findOrFail($id);

        return view('backEnd.entidad.edit', compact('entidad'));
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
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\(\)\_\s\-]+$/', ]);

        $entidad = Entidad::findOrFail($id);
        $entidad->update($request->all());

        Session::flash('message', 'La Entidad se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('entidad');
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
        $entidad = Entidad::findOrFail($id);

        $entidad->delete();

        Session::flash('message', 'La Entidad se eliminó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('entidad');
    }

}
