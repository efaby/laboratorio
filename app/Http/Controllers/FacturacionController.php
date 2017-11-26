<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Orden;
use App\Paciente;
use App\Factura;


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
					->where('atendido', 1)
					->where('validado', 1)
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
	
	public function imprimirIndividual($id)
	{
		$orden = Orden::findOrFail($id);
		$paciente = $orden->paciente;
		$hoy = new \DateTime();
		
		DB::table('factura')->insert(['fecha_factura'  => $hoy]);
		$factura = DB::table('factura')->max('id');
		
		DB::table('orden')
		->where('id', $id)
		->update(['factura_id' => $factura]);
		
		$orden->fecha_facturacion = $hoy->format('d/m/Y');
		$detalleorden = DB::table('detalleorden')
		->join('orden', 'orden.id', '=', 'detalleorden.orden_id')
		->join('examens', 'examens.id', '=', 'detalleorden.examens_id')
		->select('examens.nombre as examen','detalleorden.precio','orden.id')
		->where('orden_id', $id)
		->get();
		
		//Imprimir
		return view('backEnd.facturacion.print', compact('orden','paciente','detalleorden'));
	}
	
	public function obtenerCliente(Request $request){
		$id=$request->id;
		$orden = (int)$request->orden_id;
		$data = Paciente::where('cedula',$id)->get();
		$result=array();
		foreach ($data as $query)
		{
			$result[] = [ 'id'=>$query->id, 'cedula' => $query->cedula,'nombres' => $query->nombres,'apellidos'=>$query->apellidos,'direccion'=>$query->direccion,'telefono'=>$query->telefono];
		}
		if (count($result > 0)){
			DB::table('orden')
			->where('id', $orden)
			->update(['pacientes_id' => $result[0]['id']]);
		}else{			
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
}