<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\TipoUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;


class UserController extends Controller
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

        $usuarios = User::all();
        return view('backEnd.user.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);

        $items = TipoUsuario::All();
        return view('backEnd.user.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);

    	$this->validate($request, [
        		'cedula' => 'nullable|regex:/^(?:\+)?\d{10,13}$/', 
        		'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'apellidos' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/', 
        
        		//'direccion'=>'regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
        		//'telefono'=>'regex: /^(?:\+)?\d{9}$/',
        ]);

        $array = [
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'name' => $request->cedula,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'password' => bcrypt($request->password),
        ];

        DB::table('users')->insert($array);
        $user_id = DB::table('users')->max('id');
        $user = User::findOrFail($user_id);
        $user->roles()->attach($request->roles);
        Session::flash('message', 'El Usuario se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('user');
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
        $request->user()->authorizeRoles(['Administrador']);

        $user = User::findOrFail($id);
        $items = TipoUsuario::All();
        return view('backEnd.user.edit', compact('user','items'));
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

        $this->validate($request, [

        		'cedula' => 'nullable|regex:/^(?:\+)?\d{10,13}$/',
        		'nombres' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		'apellidos' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
        		/*'direccion'=>'regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\.\,\s\_\-]+$/',
        		'telefono'=>'regex: /^(?:\+)?\d{9}$/', */
        		//'genero'=>'required'
        		]);

        $user = User::findOrFail($id);

        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->name = $request->cedula;       
        $user->email = $request->email;
        $user->direccion = $request->direccion;

        if ($request->password && $request->password != '') {
            $user->password = bcrypt($request->password);
        }
        
        $user->save();
        $user->roles()->detach();
        $user->roles()->attach($request->roles);

        Session::flash('message', 'El Usuario se almacenó satisfactoriamente!');
        Session::flash('status', 'success');

        return redirect('user');
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

        $user = User::findOrFail($id);
        
        $message = 'El Usuario NO se pudo eliminar porque exiten órdenes de examenes Asociados!';
        $type = 'warning';

        if(count($user->ordenes) == 0) {
            $user->delete();
            $message = 'El Usuario se eliminó satisfactoriamente!';
            $type = 'success';
        }   

        Session::flash('message', $message);
        Session::flash('status', $type);

        return redirect('user');
    }

    public function validarCedulaUser(Request $request) {
        $cedula = $request->input('cedula');
        $id = $request->input('id');

        $user = User::whereNull('deleted_at')
            ->where('id', '<>', $id)
            ->where('cedula', $cedula)
            ->get();

        if(count($user)){
            $isAvailable = false;
        }
        else{
            $isAvailable = true;
        }
        
        echo json_encode(array('valid' => $isAvailable,));
    }
}