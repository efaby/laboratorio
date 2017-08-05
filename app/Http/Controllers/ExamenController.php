<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Examan;
use App\TipoExaman;
use App\Muestra;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ExamenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $examen = Examan::all();

        return view('backEnd.examen.index', compact('examen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $items= TipoExaman::pluck('nombre', 'id')->toArray();
        $muestras= Muestra::pluck('nombre', 'id')->toArray();
        return view('backEnd.examen.create', compact('items','muestras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        						   'tipoexamens_id' => 'required',
        						   'muestras_id' => 'required',
        						   'plantilla'	 => 'required',
        						   'precio'	 => 'required|regex:/^[+-]?\d+(\.\d+)?$/',
        						   'precio_especial'  => 'required|regex:/^[+-]?\d+(\.\d+)?$/'
        ]);
        Examan::create($request->all());
        Session::flash('message', 'Examan added!');
        Session::flash('status', 'success');

        return redirect('examen');
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
        $examan = Examan::findOrFail($id);

        return view('backEnd.examen.show', compact('examan'));
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
        $examan = Examan::findOrFail($id);
        $items= TipoExaman::pluck('nombre', 'id')->toArray();
        $muestras= Muestra::pluck('nombre', 'id')->toArray();
        return view('backEnd.examen.edit', compact('examan','items','muestras'));
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
        $this->validate($request, ['nombre' => 'required', ]);

        $examan = Examan::findOrFail($id);
        $examan->update($request->all());

        Session::flash('message', 'Examan updated!');
        Session::flash('status', 'success');

        return redirect('examen');
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
        $examan = Examan::findOrFail($id);

        $examan->delete();

        Session::flash('message', 'Examan deleted!');
        Session::flash('status', 'success');

        return redirect('examen');
    }

}
