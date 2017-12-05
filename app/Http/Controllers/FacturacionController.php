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
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function individual()
	{
		$ordenes = Orden::orderBy('id', 'desc')
					->where('tipopaciente_id',1)										
					->get();
		return view('backEnd.facturacion.index', compact('ordenes'));		
	}	
	
	public function editIndividual($id)
	{
		$orden = Orden::findOrFail($id);
		$paciente = $orden->paciente;
		$hoy = new \DateTime();
		$orden->fecha_facturacion = $hoy->format('d/m/Y');
		$detalleorden = DB::table('detalleorden')
		->join('orden', 'orden.id', '=', 'detalleorden.orden_id')
		->join('examens', 'examens.id', '=', 'detalleorden.examens_id')		
		->select('examens.nombre as examen','detalleorden.precio','orden.id')
		->where('orden_id', $id)
		->get();
		return view('backEnd.facturacion.edit', compact('orden','paciente','detalleorden'));		
	}
	
	public function imprimirIndividual($val)
	{
		$array = explode('-', $val);
		$id = $array[0];
		$orden = Orden::findOrFail($id);
		$paciente = Paciente::findOrFail($array[1]);
		$hoy = new \DateTime();
		
		DB::table('factura')->insert([
				'fecha_factura'  => $hoy,
				'cliente_id'  => $array[1]
		]);
		$factura = DB::table('factura')->max('id');
		
		DB::table('orden')
		->where('id', $id)
		->update(['factura_id' => $factura]);
		
		$orden->fecha_facturacion = $hoy->format('d/m/Y');
		$detalleorden = DB::table('detalleorden')
		->join('orden', 'orden.id', '=', 'detalleorden.orden_id')
		->select('detalleorden.precio','orden.id')
		->where('orden_id', $id)
		->get();
		
		//Imprimir
		return view('backEnd.facturacion.print', compact('orden','paciente','detalleorden'));
	}
	
	public function obtenerCliente(Request $request){
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
			$result[] = [ 'id'=>'', 'cedula' => $id,'nombres' => '','apellidos'=>'','direccion'=>'','telefono'=>''];
		}
		return $result[0];
	}
	
	public function verIndividual($id)
	{
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

	/* facturacion global */

	public function global()
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

    public function imprimirGlobal($id) {
    	$factura = Factura::findOrFail($id);
    	$cliente = Paciente::findOrFail($factura->cliente_id);
    	return view('backEnd.facturacion.printGlobal', compact('factura','cliente'));
    }

    public function anexoGlobal($id) {
    	$factura = Factura::findOrFail($id);
    	$ordenes = Orden::where('factura_id',$id)->get();    
    	$cliente = Paciente::findOrFail($factura->cliente_id);
    	return view('backEnd.facturacion.printAnexo', compact('factura', 'ordenes','cliente'));
    }

    public function listadoGlobal() {
    	$facturas = Factura::where('tipo',2)->get();
    	return view('backEnd.facturacion.listadoGlobal', compact('facturas'));
    }

}