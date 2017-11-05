<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Orden;
use App\Paciente;
use App\Examan;
use App\TipoPaciente;
use App\Muestra;
use App\Detalleorden;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Codigosorden;
use App\TipoExaman;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Orden::orderBy('id', 'desc')->get();;

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
    	return view('backEnd.orden.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$is_relacional = $request->input('is_relacional');
    	$is_relacional = isset($is_relacional)?1:0;
    	$paciente_id = $request->input('id_paciente');
        //Poner id de usuario logueado 
        $user_id = 1;
        $abono = $request->input('abono');
        $descuento = $request->input('descuento');
        $tipopaciente_id = $request->input('tipopaciente_id');
        $tipopago_id = $request->input('tipopago_id');
        $fecha_entrega = $request->input('fecha_entrega');
        $nombre_medico = $request->input('nombre_medico');

        $paciente = Paciente::findOrFail($paciente_id);
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

        $muestras = $request->input('muestras');

        $subtotal = array_sum($precio_array);
        $total = $subtotal - $descuento;
        $examen_ids =$request->input('ids'); // obtenermos los
        
        
        $is_relacional = $request->input('is_relacional');
        if(isset($is_relacional)){
        	$is_relacional =1;
        }else{
        	$is_relacional =0;
        }
        $array = [
        		'pacientes_id'  => $paciente_id,
        		'user_id'    => $user_id,
        		'fecha_emision' => new \DateTime(),
        		'fecha_entrega' => $fecha_entrega,
        		'abono' =>$abono,
        		'tipo_pago' =>1,
        		'iva' => 0,
        		'subtotal'=>$subtotal,
        		'total'=>$total,
        		'estado'=>1,
        		'created_at'=>new \DateTime(),
        		'cliente_id' => 0,
        		'descuento' =>$descuento,
                'nombre_medico' => $nombre_medico,
        		'usuario_atiende' =>0,
        		'atendido' =>0,
                'tipopaciente_id' => $tipopaciente_id,
        		'is_relacional'=>$is_relacional
        		];
        DB::table('orden')->insert($array);
        $orden_id = DB::table('orden')->max('id');
        
        $examens = [];
        $i = 0;
        foreach ($examen_ids as $exa) {
        	$examens[] = [
        			'orden_id'  => $orden_id,
        			'examens_id'=> $exa,
        			'created_at'=> new \DateTime(),
                    'precio' => $precio_array[$i],
                    'muestra_id' => $muestras[$i]
        	];
            $i++;
        }
        DB::table('detalleorden')->insert($examens);
        Session::flash('message', 'La Orden se almaceno satisfactoriamente!');
        Session::flash('status', 'success');
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
    	$orden = Orden::findOrFail($id);
    	
    	return view('backEnd.orden.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$orden = Orden::findOrFail($id);
        $paciente = $orden->paciente;
        $detalleorden = $orden->detalleorden;
        $items= TipoPaciente::pluck('nombre', 'id')->toArray();        
        $iteration = count($detalleorden);  	
        return view('backEnd.orden.edit', compact('orden','paciente','detalleorden','items', 'iteration'));
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
        $orden = Orden::findOrFail($id);
        $paciente_id = $request->input('id_paciente');
        //Poner id de usuario logueado 
        $user_id = 1;        
        $tipopaciente_id = $request->input('tipopaciente_id');
        $descuento = $request->input('descuento');
        $paciente = Paciente::findOrFail($paciente_id);
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

        $orden->abono = $request->input('abono');
        $orden->user_id = $user_id;
        $orden->descuento = $request->input('descuento');
        $orden->tipopaciente_id = $tipopaciente_id;
        $orden->tipo_pago = $request->input('tipopago_id');
        $orden->fecha_entrega = $request->input('fecha_entrega');
        $orden->nombre_medico = $request->input('nombre_medico');
        $orden->subtotal = $subtotal;
        $orden->total = $total;        
        $is_relacional = $request->input('is_relacional');
        if(isset($is_relacional)){
        	$orden->is_relacional =1;
        }else{
        	$orden->is_relacional =0;
        }
        
        $orden->save();
        Detalleorden::where('orden_id', '=', $id)->delete();
        $examen_ids =$request->input('ids');      
        $examens = [];
        $i = 0;
        foreach ($examen_ids as $exa) {
            $examens[] = [
                    'orden_id'  => $id,
                    'examens_id'=> $exa,
                    'created_at'=> new \DateTime(),
                    'precio' => $precio_array[$i]
            ];
            $i++;
        }
        DB::table('detalleorden')->insert($examens);
        //$orden->detalleorden()->sync($examens);
        Session::flash('message', 'La Orden se almaceno satisfactoriamente!');
        Session::flash('status', 'success');
        return redirect('orden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orden = Orden::findOrFail($id);

        $message = 'La Orden NO se pudo eliminar porque es ya fue atendida!';
        $type = 'warning';
        if($orden->atendido === 0){
            $orden->delete();
            $message = 'La Orden se eliminó satisfactoriamente!';
            $type = 'success';
        }   

        Session::flash('message', $message);
        Session::flash('status', $type);

        return redirect('orden');
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
    		$result[] = [ 'id' => $query->id, 'value' => $query->cedula .' - '.$query->apellidos. ' ' .$query->nombres, 'nombres' => $query->apellidos.' '.$query->nombres, 'direccion' => $query->direccion, 'telefono' => $query->telefono,'celular' => $query->celular,'edad' => $query->edad];
    	}
    	return response()->json($result);    	     	
    }
    
    public function examenes (){
        $examenes = Examan::orderBy('tipoexamens_id', 'asc')->get();
        $tipos = tipoexaman::orderBy('id', 'asc')->get();
        $limit = round(count($examenes) / 4);
        return view('backEnd.orden.modalExamenes', compact('examenes','limit','tipos'));        
    }

    public function examenesDetalles(Request $request) {

        $ids = $request->input('ids');
        $muestrasIds = $request->input('muestras');
        $muestrasIds = array_unique($muestrasIds);
        $is_relacional = $request->input('is_relacional');
        $id_paciente = $request->input('id_paciente');    

        $hoy = new \DateTime();
        $hoy_format = $hoy->format('Y-m-d');

        $data = Examan::whereIn('id', $ids)->get();


        $muestras = Muestra::whereIn('id', $muestrasIds)->get();

        foreach ($data as $query) {
            foreach ($muestras as $item) {
                if($item->tipoexamens_id === $query->tipoexamens_id) {
                    $query->muestra = $item;
                }
            }
        }

        $result=array();
        
        if($is_relacional == 1){                        
            $detalle= DB::table('orden')
                            ->join('detalleorden', 'orden.id', '=', 'detalleorden.orden_id')
                            ->select('detalleorden.*')
                            ->where('pacientes_id', $id_paciente)
                            ->whereAnd('fecha_emision', $hoy_format)
                            ->get();
            
            foreach ($data as $query)           
            {
                $band=false;
                foreach ($detalle as $d)
                {     
                    if($d->examens_id == $query->id){
                        $band=true;                     
                    }                   
                }
                if($band==true){
                    $result[] = [ 'id' => $query->id, 'value' => $query->nombre , 'precio_normal' => '0.00', 'tipo' => $query->tipoexaman->nombre,  'precio_laboratorio' => '0.00', 'precio_clinica' => '0.00', 'examen' => $query->nombre , 'muestra' => $query->muestra->nombre, 'muestraId' => $query->muestra->id];             
                }else{
                    $result[] = [ 'id' => $query->id, 'value' => $query->nombre , 'precio_normal' => $query->precio_normal, 'tipo' => $query->tipoexaman->nombre,  'precio_laboratorio' => $query->precio_laboratorio, 'precio_clinica' => $query->precio_clinica, 'examen' => $query->nombre, 'muestra' => $query->muestra->nombre, 'muestraId' => $query->muestra->id ];                  
                }
            }           
            // if isrelated se deberia hacer una consulta in            
            // detalle de todas las ordenes de ese dia y comparas con los resultados del sql del term
            
        }else{
            foreach ($data as $query)
            {
                $result[] = [ 'id' => $query->id, 'value' => $query->nombre , 'precio_normal' => $query->precio_normal, 'tipo' => $query->tipoexaman->nombre,  'precio_laboratorio' => $query->precio_laboratorio, 'precio_clinica' => $query->precio_clinica, 'examen' => $query->nombre, 'muestra' => $query->muestra->nombre, 'muestraId' => $query->muestra->id ];
    
            }
        }
        return response()->json($result); 
    }

    public function medicos(Request $request)
    {
        $term=$request->term;
        $data = Orden::where('nombre_medico','LIKE','%'.$term.'%')
        ->whereAnd('deleted_at','is null')
        ->take(10)
        ->get();
        $result=array();
        foreach ($data as $query)
        {
            $result[] = [ 'value' => $query->nombre_medico ];
        }
        return response()->json($result);               
    }

    public function orden($id) {
        $orden = $this->getOrden($id);
        $validar = false;
        $paciente = $orden['paciente'];
        $plantilla = $orden['plantilla'];
        $orden = $orden['orden'];
        return view('backEnd.orden.orden', compact('orden', 'paciente', 'plantilla', 'validar'));
    }

    public function validar($id) {        
        $orden = $this->getOrden($id);
        $validar = true;
        $paciente = $orden['paciente'];
        $plantilla = $orden['plantilla'];
        $orden = $orden['orden'];
        return view('backEnd.orden.orden', compact('orden', 'paciente', 'plantilla', 'validar'));             
    }

    private function getOrden($id) {
        $orden = Orden::findOrFail($id);
        $paciente = $orden->paciente;
        $plantilla = $orden->plantilla;
        if ($plantilla === null) {
            $detalleorden = $orden->detalleorden;
            foreach ($detalleorden as $item) {
                $plantilla .= "MUESTRA:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ".$item->examan->muestra->nombre.$item->examan->plantilla;
            }
        }
        return array('orden' => $orden, 'paciente' => $paciente, 'plantilla' => $plantilla );
    }

    public function saveOrden(Request $request)
    {
    	$this->validate($request, ['orden_id' => 'required',
                                   'plantilla'   => 'required'
        ]);
        $orden_id = $request->input('orden_id');
        $plantilla = $request->input('plantilla');
        $validar = $request->input('validar');
        $is_relacional = $request->is_relacional;
        
        $orden = Orden::findOrFail($orden_id);
        $orden->plantilla = $plantilla;
        $orden->atendido = 1;
        $redirect = "orden1";
        if($validar) {
            $orden->validado = 1;
            $orden->usuario_valida = 1; // user sesion
            $orden->fecha_validacion = date('Y-m-d');
            $redirect = "validar";
        } else {
            $orden->usuario_atiende = 1; // user sesion
        }

        $orden->save();
        Session::flash('status', 'success');
        Session::flash('message', 'La Orden se Actualizo satisfactoriamente!');
        return redirect()->route($redirect, ['id' => $orden_id]);
    }
    
    public function ordenPdf($id)
    {
    	$orden = Orden::findOrFail($id);
    	$paciente = $orden->paciente;
    	$plantilla = explode('<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>',$orden->plantilla);
    	$view =  \View::make('pdf.ordengenerada', compact('orden', 'paciente', 'plantilla'))->render();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf->loadHTML($view);
    	return $pdf->stream('invoice');
    }

    public function imprimir($id)
    {
        // verificar el usuario que va  imprimir
        return view('backEnd.orden.imprimir', compact('id'));
    }
    
    public static function alphaNumeric($length)
    {
    	$chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	$clen   = strlen( $chars )-1;
    	$id  = '';
    
    	for ($i = 0; $i < $length; $i++) {
    		$id .= $chars[mt_rand(0,$clen)];
    	}
    	return ($id);
    }
    
    public function generarCodigo($id){
    	$orden = Orden::findOrFail($id);
    	$paciente = $orden->paciente;
    	$orden= Codigosorden::where('orden_id', '=', $id)->count();
    	if($orden>0){
    		$ord= Codigosorden::where('orden_id', '=', $id)->firstOrFail();
    		$codigo = $ord->codigo;
    	}else{
	    	$codigo = $this->alphaNumeric(6);
	    	$array = [
	    			'cedula'  => $paciente->cedula,
	    			'fecha'    => new \DateTime(),
	    			'codigo' => $codigo,
	    			'orden_id' => $id    			
	    	];
	    	DB::table('codigosorden')->insert($array);
    	}
    	return view('backEnd.orden.modal', compact('codigo'));    	
    }
    
    public function updatePage(){
    	return redirect()->to('orden');
    }
    
    public function autocompletgrupo(Request $request)
    {
    	$muestra=$request->term;
    	$tipo_examen = $request->tipo_examen;

    	$data = Muestra::where(DB::raw("`nombre`"),'LIKE','%'.$muestra.'%')
    	->where('tipoexamens_id','=',$tipo_examen)   	
    	->take(10)
    	->get();
    	$result=array();
    	foreach ($data as $query)
    	{
    		$result[] = [ 'value' => $query->nombre, 'label'=>$query->nombre, 'id' => $query->id];    		
    	}
    	return response()->json($result);
    }
      
}