<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use App\TipoPaciente;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ClienteController extends Controller
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

        $cliente = Cliente::where('cedula','<>','9999999999')->get();
        return view('backEnd.cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

    	$items = TipoPaciente::pluck('nombre', 'id')->toArray();
    	return view('backEnd.cliente.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        //$this->validate($request, ['cedula' => 'required', 'nombres' => 'required', 'apellidos' => 'required', ]);
        $this->validate($request, [

                'cedula' => 'required|regex:/^(?:\+)?\d{10,13}$/', 
                'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
                'apellidos' => 'nullable|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/', 
                'direccion'=>'required|regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
                'telefono'=>'nullable|regex: /^(?:\+)?\d{9}$/'
        ]);

        Cliente::create($request->all());

        Session::flash('message', 'El Cliente se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('cliente');
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

        $cliente = Cliente::findOrFail($id);

        return view('backEnd.cliente.show', compact('cliente'));
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

        $cliente = Cliente::findOrFail($id);
        $items = TipoPaciente::pluck('nombre', 'id')->toArray();

        return view('backEnd.cliente.edit', compact('cliente','items'));
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

       // $this->validate($request, ['cedula' => 'required', 'nombres' => 'required', 'apellidos' => 'required', ]);
         $this->validate($request, [

                'cedula' => 'required|regex:/^(?:\+)?\d{10,13}$/', 
                'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
                'apellidos' => 'nullable|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/', 
                'direccion'=>'required|regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
                'telefono'=>'nullable|regex: /^(?:\+)?\d{9}$/'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        Session::flash('message', 'El Cliente se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('cliente');
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

        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        Session::flash('message', 'El Cliente se eliminó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('cliente');
    }

}
