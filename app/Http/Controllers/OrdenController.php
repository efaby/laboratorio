<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Orden;
use App\Paciente;
use App\Examan;
use App\TipoPaciente;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Orden::all();

        return view('backEnd.orden.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$items= TipoPaciente::pluck('nombre', 'id')->toArray();
    	return view('backEnd.orden.create', compact('items','tipo_pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente_id = $request->input('id_paciente');
        //Poner id de usuario logueado 
        $user_id = 1;
        $abono = $request->input('abono');
        $descuento = $request->input('descuento');
        $tipopaciente_id = $request->input('tipopaciente_id');
        $tipopago_id = $request->input('tipopago_id');
        $fecha_entrega = $request->input('fecha_entrega');

        $paciente = Paciente::findOrFail($$paciente_id);
        $paciente->edad = $request->input('edad');
        $paciente->save();
      
        if($tipopaciente_id == 1){
        	$precio_array = $request->input('preciop');
        }        
        if($tipopaciente_id == 2){
          
            $precio_array = $request->input('preciol');
        }
        if($tipopaciente_id == 3){
            $precio_array = $request->input('precioc');
        }
        $subtotal = array_sum($precio_array);
        $total = $subtotal - $descuento;
        $examen_ids =$request->input('ids'); // obtenermos los 
        
        $array = [
        		'pacientes_id'  => $paciente_id,
        		'user_id'    => $user_id,
        		'fecha_emision' => new \DateTime(),
        		'fecha_entrega' => new \DateTime(),
        		'tipo_pago' =>1,
        		'abono' =>$abono,
        		'subtotal'=>$subtotal,
        		'descuento' =>$descuento,
        		'total'=>$total,
        		'estado'=>1,
                'iva' => 0,
                'cliente_id' => 0,
        		'created_at'=>new \DateTime()
        		];
        DB::table('orden')->insert($array);
        $orden_id = DB::table('orden')->max('id');
        
        $examens = [];
        foreach ($examen_ids as $exa) {
        	$examens[] = [
        			'orden_id'  => $orden_id,
        			'examens_id'=> $exa,
        			'created_at'=> new \DateTime(),
        	];
        }
        DB::table('detalleorden')->insert($examens);
        Session::flash('message', 'La Orden se almaceno satisfactoriamente!');
        return redirect('orden');    	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function autocomplete(Request $request)
    {
    	$term=$request->term;
    	$data = paciente::where(DB::raw("CONCAT(`nombres`, ' ', `apellidos`)"),'LIKE','%'.$term.'%')
    	->whereAnd('deleted_at','is null')
    	->take(10)
    	->get();
    	$result=array();
    	foreach ($data as $query)
    	{
    		$result[] = [ 'id' => $query->id, 'value' => $query->cedula .' - '.$query->nombres.' '.$query->apellidos, 'nombres' => $query->nombres.' '.$query->apellidos, 'direccion' => $query->direccion, 'telefono' => $query->telefono,'celular' => $query->celular,'edad' => $query->edad];
    	}
    	return response()->json($result);    	     	
    }

    public function examenes (Request $request){
        $term=$request->term;
        $data = Examan::where('nombre','LIKE','%'.$term.'%')
        ->whereAnd('deleted_at','is null')
        ->take(10)
        ->get();
        $result=array();
        foreach ($data as $query)
        {
            $result[] = [ 'id' => $query->id, 'value' => $query->nombre . " - " . $query->muestra->nombre, 'precio_normal' => $query->precio_normal, 'tipo' => $query->tipoexaman->nombre, 'muestra' => $query->muestra->nombre, 'precio_laboratorio' => $query->precio_laboratorio, 'precio_clinica' => $query->precio_clinica, 'examen' => $query->nombre ];

        }
        return response()->json($result);    
    }
}