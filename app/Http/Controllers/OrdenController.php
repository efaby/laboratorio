<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Orden;
use App\Paciente;
use App\Examan;
use App\TipoPaciente;
use App\Muestra;
use App\Entidad;
use App\Detalleorden;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Codigosorden;
use App\TipoExaman;

class OrdenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
        
        //$ordenes = Orden::orderBy('id', 'desc')->get();
        	
        $entidad = $request->user()->entidad_id;
        
        $ordenes = Orden::join('users', 'orden.user_id', '=', 'users.id')
        ->select('orden.id as id','orden.*')
        ->where('entidad_id',$entidad)
        ->orderBy('orden.id', 'desc')->get();
        
        return view('backEnd.orden.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
        $entidad = $request->input('entidad');
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
            DB::table('orden')
            ->where('pacientes_id', $paciente_id)
            ->where('fecha_emision', date("Y-m-d"))
            ->where('is_relacional', 0)
            ->update(['is_relacional' => 1]);

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
                'descuento' =>$descuento,
                'nombre_medico' => $nombre_medico,
                'usuario_atiende' =>0,
                'atendido' =>0,
                'tipopaciente_id' => $tipopaciente_id,
                'is_relacional'=>$is_relacional,
        		'entidad'=>$entidad
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

        $apellidos = explode(" ", $paciente->apellidos);
        
        $entidad_all = Entidad::findOrFail($user_id);
        
        if($entidad_all->anio ==  null || $entidad_all->anio < date('Y')){
        	DB::table('entidad')
        	->where('id', $entidad_all->id)
        	->update(['anio' => date('Y'),'contador' => 1]);
        	 
        }
        
        if($entidad_all->anio == date('Y')){       
	       	DB::table('entidad')
	       	->where('id', $entidad_all->id)
	       	->update(['contador' => ($entidad_all->contador+1)]);
        }
       	
        $entidad_all = Entidad::findOrFail($user_id);
        
        $codigo = $entidad_all->anio . "-" . str_pad($entidad_all->contador, 4, "0", STR_PAD_LEFT); 
        
        DB::table('orden')
            ->where('id', $orden_id)
            ->update(['codigo' => $codigo]);

        Session::flash('message', 'La Orden se almacenó satisfactoriamente!');
        Session::flash('status', 'success');
        return redirect('orden');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $orden = Orden::findOrFail($id);
        
        return view('backEnd.orden.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $orden = Orden::findOrFail($id);
        $paciente = $orden->paciente;
        
        $detalleorden = DB::table('detalleorden')
                            ->join('muestras', 'muestras.id', '=', 'detalleorden.muestra_id')
                            ->join('examens', 'examens.id', '=', 'detalleorden.examens_id')
                            ->join('tipoexamens', 'examens.tipoexamens_id', '=', 'tipoexamens.id')
                            ->select('examens.id as examen_id','examens.nombre as examen','examens.precio_normal',
                                    'examens.precio_laboratorio','examens.precio_clinica',
                                    'muestras.nombre as muestra', 'detalleorden.*','tipoexamens.*')                            
                            ->where('orden_id', $id)                            
                            ->get();    
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
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
        
        $muestras = $request->input('muestras');
        
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
            // update 
            DB::table('orden')
            ->where('pacientes_id', $paciente_id)
            ->where('fecha_emision', date("Y-m-d"))
            ->where('is_relacional', 0)
            ->update(['is_relacional' => 1]);

        }else{
            $orden->is_relacional =0;
        }
        
        $orden->entidad = ($tipopaciente_id > 1)? $request->input('entidad'):null;


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
                    'precio' => $precio_array[$i],                  
                    'muestra_id' => $muestras[$i]
                    
            ];
            $i++;
        }
        DB::table('detalleorden')->insert($examens);
        //$orden->detalleorden()->sync($examens);
        Session::flash('message', 'La Orden se almacenó satisfactoriamente!');
        Session::flash('status', 'success');
        return redirect('orden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $term=$request->term;
        $data = paciente::where(DB::raw("CONCAT(`nombres`, ' ', `apellidos`)"),'LIKE','%'.$term.'%')
        ->orWhere('cedula','LIKE','%'.$term.'%')
        ->whereNull('deleted_at')
        ->take(10)
        ->get();
        $result=array();
        foreach ($data as $query)
        {
            $result[] = [ 'id' => $query->id, 'value' => $query->cedula .' - '.$query->apellidos. ' ' .$query->nombres, 'nombres' => $query->apellidos.' '.$query->nombres, 'direccion' => $query->direccion, 'telefono' => $query->telefono,'celular' => $query->celular,'edad' => $query->edad];
        }
        return response()->json($result);               
    }

    public function examenesEdit (Request $request){
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $ids = json_decode($request->ids);
        $muestrasIds = json_decode($request->muestrasIds);        
        $muestrasUnicas = array_unique($muestrasIds);       
        $muestrasAux = DB::table('muestras')
                   ->whereIn('id', $muestrasUnicas)
                   ->get();
        foreach ($muestrasAux as $muestra){
            $estructura[$muestra->id] = (object) array('id' => $muestra->id, 'nombre' => $muestra->nombre);         
        }               
        $examenes = Examan::orderBy('tipoexamens_id', 'asc')->get();
        $tipos = tipoexaman::orderBy('id', 'asc')->get();
        $limit = round(count($examenes) / 4);
        $muestras = [];
        
        foreach ($examenes as $exa){
            $contador = 0;
            foreach ($ids as $deta){
                if($deta == $exa->id){
                    $muestras[$exa->tipoexamens_id] =  $estructura[$muestrasIds[$contador]];
                    $exa->marca = 1;
                }
                $contador++;
            }           
        }       
        return view('backEnd.orden.modalExamenesEdit', compact('examenes','limit','tipos','muestras'));
    }

    public function examenesDetalles(Request $request) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
        
        if($is_relacional){                        
            $detalle= DB::table('orden')
                            ->join('detalleorden', 'orden.id', '=', 'detalleorden.orden_id')
                            ->select('detalleorden.*')
                            ->where('pacientes_id', $id_paciente)
                            ->where('fecha_emision', $hoy_format)
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
                    $result[] = [ 'id' => $query->id, 'value' => $query->nombre , 'precio_normal' => '0.00', 'tipo' => $query->tipoexaman->nombre,  'precio_laboratorio' => '0.00', 'precio_clinica' => '0.00', 'examen' => $query->nombre , 'muestra' => $query->muestra->nombre, 'muestraId' => $query->muestra->id,'is_relacional'=>$is_relacional];             
                }else{
                    $result[] = [ 'id' => $query->id, 'value' => $query->nombre , 'precio_normal' => $query->precio_normal, 'tipo' => $query->tipoexaman->nombre,  'precio_laboratorio' => $query->precio_laboratorio, 'precio_clinica' => $query->precio_clinica, 'examen' => $query->nombre, 'muestra' => $query->muestra->nombre, 'muestraId' => $query->muestra->id,'is_relacional'=>$is_relacional ];                  
                }
            }
            // if isrelated se deberia hacer una consulta in            
            // detalle de todas las ordenes de ese dia y comparas con los resultados del sql del term
            
        }else{
        	foreach ($data as $query)
            {
                $result[] = [ 'id' => $query->id, 'value' => $query->nombre , 'precio_normal' => $query->precio_normal, 'tipo' => $query->tipoexaman->nombre,  'precio_laboratorio' => $query->precio_laboratorio, 'precio_clinica' => $query->precio_clinica, 'examen' => $query->nombre, 'muestra' => $query->muestra->nombre, 'muestraId' => $query->muestra->id,'is_relacional'=>$is_relacional ];
    
            }
        }
        return response()->json($result); 
    }

    public function medicos(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $term=$request->term;
        $data = Orden::where('nombre_medico','LIKE','%'.$term.'%')
        ->whereNull('deleted_at')
        ->take(10)
        ->get();
        $result=array();
        foreach ($data as $query)
        {
            $result[] = [ 'value' => $query->nombre_medico ];
     
        }
        return response()->json($result);               
    }

    public function orden(Request $request,$id) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $orden = $this->getOrden($id);
        $validar = false;
        $paciente = $orden['paciente'];
        $plantilla = $orden['plantilla'];
        $orden = $orden['orden'];
        return view('backEnd.orden.orden', compact('orden', 'paciente', 'plantilla', 'validar'));
    }

    public function validar(Request $request,$id) {
    	$request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
           // $detalleorden = $orden->detalleorden;

            $detalleorden = DB::table('detalleorden')
                            ->join('muestras', 'muestras.id', '=', 'detalleorden.muestra_id')
                            ->join('examens', 'examens.id', '=', 'detalleorden.examens_id')
                            ->join('tipoexamens', 'examens.tipoexamens_id', '=', 'tipoexamens.id')
                            ->select('examens.plantilla','examens.nombre','muestras.nombre as muestra','tipoexamens.id as type')                            
                            ->where('orden_id', $id)    
                            ->orderBy('tipoexamens.id')                        
                            ->get();
            $muestra = 0; 
            foreach ($detalleorden as $item) {
               
                if($muestra != $item->type) {
                    $plantilla .= "</br></br><span style='font-size:13px'><b>MUESTRA:</b>&nbsp;  ". $item->muestra."</span>";
                    $muestra = $item->type;
                }
                $plantilla .= "<p style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>RESULTADO</u></b> &nbsp;&nbsp;&nbsp;&nbsp; VALOR DE REFERENCIA</p>" ;
                $plantilla .= preg_replace('/<\\/?p(.|\\s)*?>/', "",$item->plantilla);

            }
        }

        return array('orden' => $orden, 'paciente' => $paciente, 'plantilla' => $plantilla );
    }

    public function saveOrden(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
        Session::flash('message', 'La Orden se almacenó satisfactoriamente!');
        return redirect()->route($redirect, ['id' => $orden_id]);
    }
    
    public function ordenPdf(Request $request,$id)
    {
    	$request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
    	
    	DB::table('orden')
    	->where('id', $id)
    	->increment('num_impresion',1);
    	
        $orden = Orden::findOrFail($id);        
        
        $paciente = $orden->paciente;
        $plantilla = explode('<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>',$orden->plantilla);
      //  $plantilla[0] = '<span style=font-size:13px;>'.$plantilla[0].'</span>';
        //return view('pdf.ordengenerada', compact('orden', 'paciente', 'plantilla'));
       
        $view =  \View::make('pdf.ordengenerada', compact('orden', 'paciente', 'plantilla'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
       // $pdf->getDomPDF()->get_canvas()->get_cpdf()->setEncryption('trees','frogs',array('copy','print'));
       // $dompdf->get_canvas()->get_cpdf()->setEncryption('trees','frogs',array('copy','print'));
        //$pdf->getDomPDF()->getCanvas()->get_cpdf()->setEncryption("pass", 'your_password');
        return $pdf->stream('invoice'); 
    }

    public function imprimir(Request $request,$id)
    {
    	$request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
    	
    	self::validar($request,$id);
    	
        $orden = Orden::findOrFail($id);
        $num_impresion = $orden->num_impresion;
        

        // verificar el usuario que va  imprimir
        return view('backEnd.orden.imprimir', compact('id','num_impresion'));
    }

    public function imprimirListado(Request $request,$id)
    {
    	$request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
        $orden = Orden::findOrFail($id);
        $num_impresion = $orden->num_impresion;
        
        // verificar el usuario que va  imprimir para mandar el mensaje
        return view('backEnd.orden.imprimirListado', compact('id','num_impresion'));
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
    
    public function generarCodigo(Request $request,$id){
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $orden = Orden::findOrFail($id);
        $paciente = $orden->paciente;
        $paciente_ced = isset($paciente->cedula)?$paciente->cedula:'N/A';        
        
        $orden= Codigosorden::where('orden_id', '=', $id)->count();
        if($orden>0){
            $ord= Codigosorden::where('orden_id', '=', $id)->firstOrFail();
            $codigo = $ord->codigo;
        }else{
            $codigo = $this->alphaNumeric(6);
            $array = [
                    'cedula' => isset($paciente->cedula)?$paciente->cedula:0,
                    'fecha'  => new \DateTime(),
                    'codigo' => $codigo,
                    'orden_id' => $id               
            ];
            DB::table('codigosorden')->insert($array);
        }
        
        return view('backEnd.orden.modal', compact('codigo','paciente_ced'));      
    }
    
    public function updatePage(){
        return redirect()->to('orden');
    }
    
    public function autocompletgrupo(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

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
    
    public function entidades(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

    	$id=$request->id;
        $idSelect=$request->select;

    	$required = null;
    	if($id !=1){
    		$required = 'required';
    		if($id ==2){
    			$etiqueta = "Laboratorio";
    		}
    		if($id ==3){
    			$etiqueta = "Clinica";
    		}
    		$data = Paciente::where('tipopacientes_id','=',$id)->get();
    		$result = "<div class='col-md-1'>
    					<label for='entidad_l' class='col-md-1 control-label'>".$etiqueta."</label></div>
    			   <div class='col-md-3'><select name='entidad' id='entidad' class='form-control input-sm'".$required.">";
    		//$result.= '<option>Seleccione</option>';
    		foreach ($data as $query)
    		{
                $select = ($query->id == $idSelect)? "selected":"";

    			$result.= '<option value="'.$query->id.'" '.$select.' >'.$query->nombres.' '.$query->apellidos.'</option>';
    		}
    		 
    		$result.="</select></div>";
    		return $result;
    	}   	
    } 
}