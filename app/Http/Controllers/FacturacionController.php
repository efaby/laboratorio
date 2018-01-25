<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Orden;
use App\Paciente;
use App\Factura;
use App\TipoPaciente;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class FacturacionController extends Controller
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
	public function individual(Request $request)
	{
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
		
        if ($request->user()->authorizeMenu(['Administrador']))
        {
			$ordenes = Orden::orderBy('id', 'desc')
					->where('tipopaciente_id',1)										
					->get();
        }else{
        	$entidad = $request->user()->entidad_id;
        	
        	$ordenes = Orden::join('users', 'orden.user_id', '=', 'users.id')
        	->select('orden.id as id','orden.*')
        	->where('entidad_id',$entidad)
        	->where('tipopaciente_id',1)
        	->orderBy('orden.id', 'desc')
        	->get();
        }
		return view('backEnd.facturacion.index', compact('ordenes'));		
	}	
	
	public function editIndividual(Request $request,$id)
	{
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

		$orden = Orden::findOrFail($id);
		$paciente = $orden->paciente;
		$hoy = new \DateTime();
		$orden->fecha_facturacion = $hoy->format('d/m/Y');
		$total = 0;
		$abono = 0;
		$total_pagar = 0;
		
		if($orden->is_relacional) {
			$ordenes = DB::table('orden')	
			->select('orden.total','orden.abono')
			->where('pacientes_id', $orden->pacientes_id)
            ->where('fecha_emision', $orden->fecha_emision)
            ->where('is_relacional', 1)
			->get();
			foreach ($ordenes as $item) {
				$total = $total + $item->total;
				$abono = $abono+ $item->abono;
	        }
		} else {
			$total = $orden->total;
			$abono = $orden->abono;
		}	
		
		$total_pagar = $total - $abono;
		
		return view('backEnd.facturacion.edit', compact('orden','paciente', 'total','abono','total_pagar'));		
	}
	
	public function guardarFacturaIndividual(Request $request) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

		$orden_id = $request->orden_id;
		$paciente_id = $request->paciente_id;
		$total = $request->total;
		$is_relacional = $request->is_relacional;

		$hoy = new \DateTime();
		DB::table('factura')->insert([
				'fecha_factura'  => $hoy,
				'cliente_id'  => $paciente_id,
				'precio' => $total,
				'num_factura' => $request->num_factura
		]);
		$factura = DB::table('factura')->max('id');

		if($is_relacional) {
			$orden = Orden::findOrFail($orden_id);
			$ordenes = DB::table('orden')	
			->select('orden.id')
			->where('pacientes_id', $paciente_id)
            ->where('fecha_emision', $orden->fecha_emision)
            ->where('is_relacional', 1)
			->get();
			$ides = array();
			foreach ($ordenes as $item) {
				$ides[] = $item->id;
	        }

	        DB::table('orden')
			->whereIn('id', $ides)
			->update(['factura_id' => $factura]);
			return response()->json($factura);

	    } else {
	    	DB::table('orden')
			->where('id', $orden_id)
			->update(['factura_id' => $factura]);
			return response()->json($factura);
	    }
		
				
	}
	
	public function imprimirIndividual(Request $request,$id)
	{
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

		$factura = Factura::findOrFail($id);
		$paciente = Paciente::findOrFail($factura->cliente_id);
		
		$ordenes = Orden::where('factura_id', $id)
		->get();
		$total = 0;
		$abono = 0;
		foreach ($ordenes as $orden) {
			$total= $total + $orden->total;
			$abono = $abono+ $orden->abono;
		}
		$total_pagar = $total - $abono;
		
		//Imprimir
		return view('backEnd.facturacion.print', compact('orden','paciente','factura','total','abono','total_pagar'));
	}
	
	public function obtenerCliente(Request $request){
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

		$id=$request->id;
		if(isset($id)){
			$data = Paciente::where('cedula',$id)->get();
		}else{
			$data = Paciente::where('cedula','9999999999')->get();			
		}		
		$result=array();
		foreach ($data as $query)
		{
			$result[] = [ 'id'=>$query->id, 'cedula' => $query->cedula,'nombres' => $query->nombres,'apellidos'=>$query->apellidos,'direccion'=>$query->direccion,'telefono'=>$query->telefono];
		}
		if (count($result == 0)){
			$result[] = [ 'id'=>0, 'cedula' => $id,'nombres' => '','apellidos'=>'','direccion'=>'','telefono'=>''];
			/*Session::flash('message', 'No existe ningun resultado asociado al Cliente!');
			Session::flash('status', 'warning');		*/	
		}
		return $result[0];
	}
	
	public function verIndividual(Request $request,$id)
	{
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

		$orden = Orden::findOrFail($id);
		$paciente = $orden->paciente;		
		$detalleorden = DB::table('detalleorden')
		->join('orden', 'orden.id', '=', 'detalleorden.orden_id')
		->join('examens', 'examens.id', '=', 'detalleorden.examens_id')
		->select('examens.nombre as examen','detalleorden.precio','orden.id')
		->where('orden_id', $id)
		->get();
		return view('backEnd.facturacion.ver', compact('orden','paciente','detalleorden'));
	}
	
	public function anexoIndividual(Request $request,$id) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

		$factura = Factura::findOrFail($id);
		$ordenes = Orden::where('factura_id',$id)->get();
		
		$cliente = Paciente::findOrFail($factura->cliente_id);
		return view('backEnd.facturacion.printAnexoIndividual', compact('factura', 'ordenes','cliente'));
	}

	/* facturacion global */

	public function globalFac()
	{
		$cliente_id = 0;
		$fecha_inicio = "";
		$fecha_fin = "";
		$items = $this->getClients();
		$total = 0;
		$cliente = null;
		return view('backEnd.facturacion.global', compact('items', 'cliente_id', 'fecha_inicio', 'fecha_fin', 'total','cliente'));		
	}

	private function getClients() {
		$items = array();
		$tipos= TipoPaciente::where('id','>',1)->get();

		foreach ($tipos as $item) {
			$clientes = Paciente::where('tipopacientes_id',$item->id)->get();
			$subItems = array();
			foreach ($clientes as $cliente) {
				$subItems[$cliente->id] = $cliente->nombres;
			}
			$items[$item->nombre] = $subItems;
			
		}
		return $items;	
	}	

	public function facturarGlobal(Request $request) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

		$cliente_id = $request->cliente_id;
		$fecha_inicio = $request->fecha_inicio;
		$fecha_fin = $request->fecha_fin;
		$items = $this->getClients();
		$total = 0;
		$ordenes = Orden::orderBy('id', 'desc')
					->where('entidad',$cliente_id)
					->where('fecha_emision', '<=', $fecha_fin)
					->where('fecha_emision', '>=', $fecha_inicio)
					->where('factura_id', 0)
					->get();
		$cliente = Paciente::findOrFail($cliente_id);

		foreach ($ordenes as $item) {
			$total = $total + $item->total;
		}
		if($total === 0) {
			Session::flash('message', 'No existe ningun resultado asociado al Cliente!');
            Session::flash('status', 'warning');
		}
		return view('backEnd.facturacion.global', compact('items', 'cliente_id', 'fecha_inicio', 'fecha_fin', 'total','cliente'));	
	}

	public function guardarFacturaGlobal(Request $request) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

        $cliente_id = $request->cliente_id;
		$fecha_inicio = $request->fecha_inicio;
		$fecha_fin = $request->fecha_fin;
		$total = $request->total;

		$hoy = new \DateTime();
		
		DB::table('factura')->insert([
				'fecha_factura'  => $hoy,
				'cliente_id'  => $cliente_id,
				'fecha_inicio' => $fecha_inicio,
				'fecha_fin' => $fecha_fin,
				'tipo' => 2,
				'precio' => $total
		]);
		$factura = DB::table('factura')->max('id');

		DB::table('orden')
				->where('entidad',$cliente_id)
				->where('fecha_emision', '<=', $fecha_fin)
				->where('fecha_emision', '>=', $fecha_inicio)
				->where('factura_id', 0)
		->update(['factura_id' => $factura]);


		return response()->json($factura); 

    }

    public function imprimirGlobal(Request $request,$id) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);

    	$factura = Factura::findOrFail($id);
    	$cliente = Paciente::findOrFail($factura->cliente_id);
    	return view('backEnd.facturacion.printGlobal', compact('factura','cliente'));
    }

    public function anexoGlobal(Request $request,$id) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
    	$factura = Factura::findOrFail($id);
    	$ordenes = Orden::where('factura_id',$id)->get();    
    	$cliente = Paciente::findOrFail($factura->cliente_id);
    	return view('backEnd.facturacion.printAnexo', compact('factura', 'ordenes','cliente'));
    }

    public function listadoGlobal(Request $request) {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
        
        if ($request->user()->authorizeMenu(['Administrador']))
        {
        	$facturas = Factura::where('tipo',2)->get();
        }else{
        	$entidad = $request->user()->entidad_id;
        	
        	$facturas = Factura::leftJoin('orden','orden.factura_id','=','factura.id')
        	->select('factura.id as id','factura.*')
        	->join('users', 'orden.user_id', '=', 'users.id')
        	->where('entidad_id',$entidad)
        	->where('tipo',2)
        	->orderBy('factura.id','asc')
        	->get();
        	
        }
    	return view('backEnd.facturacion.listadoGlobal', compact('facturas'));
    }

}