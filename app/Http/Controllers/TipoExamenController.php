<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoExaman;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoExamenController extends Controller
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
        $request->user()->authorizeRoles(['Administrador','Analista']);
        $tipoexamen = TipoExaman::all();

        return view('backEnd.tipoexamen.index', compact('tipoexamen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista']);
        return view('backEnd.tipoexamen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista']);
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\_\s\-]+$/']);
        
        TipoExaman::create($request->all());

        Session::flash('message', 'El Tipo Exámen se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('tipoexamen');
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
        $request->user()->authorizeRoles(['Administrador','Analista']);

        $tipoexaman = TipoExaman::findOrFail($id);

        return view('backEnd.tipoexamen.show', compact('tipoexaman'));
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
        $request->user()->authorizeRoles(['Administrador','Analista']);
        $tipoexaman = TipoExaman::findOrFail($id);

        return view('backEnd.tipoexamen.edit', compact('tipoexaman'));
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
        $request->user()->authorizeRoles(['Administrador','Analista']);
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\(\)\_\s\-]+$/', ]);

        $tipoexaman = TipoExaman::findOrFail($id);
        $tipoexaman->update($request->all());

        Session::flash('message', 'El Tipo Exámen se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('tipoexamen');
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
        $request->user()->authorizeRoles(['Administrador','Analista']);
        $tipoexaman = TipoExaman::findOrFail($id);

        $tipoexaman->delete();

        Session::flash('message', 'El Tipo Exámen se eliminó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('tipoexamen');
    }

}
