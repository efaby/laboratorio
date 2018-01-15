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
        $paciente = Paciente::where('tipopacientes_id', '1')->where('cedula','<>','9999999999')->get(); 
        return view('backEnd.paciente.index', compact('paciente'));
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
        return view('backEnd.paciente.create', compact('items'));
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
        		'tipopacientes_id'=>'required',
        		'cedula' => 'nullable|regex:/^[0-9 ]+$/', 
        		'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'apellidos' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/', 
        		'edad'=>'required|regex:/^[1-9]\d*$/',
        		'celular'=>'required|regex: /^(?:\+)?\d{10}$/',
        		//'direccion'=>'regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
        		//'telefono'=>'regex: /^(?:\+)?\d{9}$/',
        		'genero'=>'required'
        ]);

        Paciente::create($request->all());

        Session::flash('message', 'El Paciente se almacenó satisfactoriamente!');
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
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
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
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
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
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
        $this->validate($request, [
        		'tipopacientes_id'=>'required',
        		'cedula' => 'nullable|regex:/^[0-9 ]+$/',
        		'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'apellidos' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'edad'=>'required|regex:/^[1-9]\d*$/',
        		'celular'=>'required|regex: /^(?:\+)?\d{10}$/',
        		/*'direccion'=>'regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
        		'telefono'=>'regex: /^(?:\+)?\d{9}$/', */
        		'genero'=>'required'
        		]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        Session::flash('message', 'El Paciente se almacenó satisfactoriamente!');
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
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $paciente = Paciente::findOrFail($id);

        $ordenes = $paciente->ordenes;
        $band = true;
        foreach ($ordenes as $orden) {
            if($orden->atendido === 1){
                $band = false;
            }
        }
        $message = 'El Paciente NO se pudo eliminar porque exiten órdenes de exámenes Asociados!';
        $type = 'warning';
        if($band) {
            $paciente->delete();
            $message = 'El Paciente se eliminó satisfactoriamente!';
            $type = 'success';
        }   

        Session::flash('message', $message);
        Session::flash('status', $type);

        return redirect('paciente');
    }

    public function validarCedula(Request $request) {
        $cedula = $request->input('cedula');
        $id = $request->input('id');

        $paciente = Paciente::whereNull('deleted_at')
            ->where('id', '<>', $id)
            ->where('cedula', $cedula)
            ->get();

        if(count($paciente)){
            $isAvailable = false;
        }
        else{
            $isAvailable = true;
        }
        
        echo json_encode(array('valid' => $isAvailable,));
    }

}
