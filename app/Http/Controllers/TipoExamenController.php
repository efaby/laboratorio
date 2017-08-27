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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipoexamen = TipoExaman::all();

        return view('backEnd.tipoexamen.index', compact('tipoexamen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.tipoexamen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/']);
        
        TipoExaman::create($request->all());

        Session::flash('message', 'El Tipo Examen se almaceno satisfactoriamente!');
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
    public function show($id)
    {
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
    public function edit($id)
    {
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
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/', ]);

        $tipoexaman = TipoExaman::findOrFail($id);
        $tipoexaman->update($request->all());

        Session::flash('message', 'El Tipo Examen se almaceno satisfactoriamente!');
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
    public function destroy($id)
    {
        $tipoexaman = TipoExaman::findOrFail($id);

        $tipoexaman->delete();

        Session::flash('message', 'El Tipo Examen se elimino satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('tipoexamen');
    }

}
