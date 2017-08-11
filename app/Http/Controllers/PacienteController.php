<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Paciente;
use App\TipoPaciente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PacienteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paciente = Paciente::all();

        return view('backEnd.paciente.index', compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $items = TipoPaciente::pluck('nombre', 'id')->toArray();
        return view('backEnd.paciente.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        		'tipopacientes_id'=>'required',
        		'cedula' => 'required|regex:/^(?:\+)?\d{10,13}$/', 
        		'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'apellidos' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/', 
        		'fecha_nacimiento'=>'required',
        		'celular'=>'required|regex: /^(?:\+)?\d{10}$/',
        		'direccion'=>'required|regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
        		'telefono'=>'regex: /^(?:\+)?\d{9}$/',
        		'genero'=>'required'
        ]);

        Paciente::create($request->all());

        Session::flash('message', 'Paciente added!');
        Session::flash('status', 'success');

        return redirect('paciente');
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
        $paciente = Paciente::findOrFail($id);

        return view('backEnd.paciente.show', compact('paciente'));
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
        $paciente = Paciente::findOrFail($id);
        $items = TipoPaciente::pluck('nombre', 'id')->toArray();
        return view('backEnd.paciente.edit', compact('paciente','items'));
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
        		'tipopacientes_id'=>'required',
        		'cedula' => 'required|regex:/^(?:\+)?\d{10,13}$/',
        		'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'apellidos' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'fecha_nacimiento'=>'required',
        		'celular'=>'required|regex: /^(?:\+)?\d{10}$/',
        		'direccion'=>'required|regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
        		'telefono'=>'regex: /^(?:\+)?\d{9}$/',
        		'genero'=>'required'
        		]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        Session::flash('message', 'Paciente updated!');
        Session::flash('status', 'success');

        return redirect('paciente');
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
        $paciente = Paciente::findOrFail($id);

        $paciente->delete();

        Session::flash('message', 'Paciente deleted!');
        Session::flash('status', 'success');

        return redirect('paciente');
    }

}
