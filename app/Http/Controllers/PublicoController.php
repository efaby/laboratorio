<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Orden;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class PublicoController extends Controller
{

    public function index() {
        $identificacion = "";
        $codigo = "";
        $id = 0;
        return view('public.index', compact('identificacion','codigo','id'));
    }

    
    public function buscarExamen(Request $request)
    {
        $this->validate($request, ['codigo' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/',
                                    'identificacion' => 'required|regex:/^(?:\+)?\d{10,13}$/',]);
        $identificacion = $request->input('identificacion');
        $codigo = $request->input('codigo');
        $orden= DB::table('orden')
            ->join('codigosorden', 'orden.id', '=', 'codigosorden.orden_id')
            ->select('orden.*')
            ->where('cedula', $identificacion)
            ->where('codigosorden.codigo', $codigo)
            ->where('validado', 1)
           // ->where('factura_id', '>',0)
            ->get();
        $id = 0;
        if(count($orden)){
            $id = $orden[0]->id;
        } else {
            Session::flash('message', 'No existe ningun resultado asociado al Paciente!');
            Session::flash('status', 'warning');
        }

        return view('public.index', compact('identificacion','codigo','id'));
    }

    public function ordenPdf($id)
    {
        $orden = Orden::findOrFail($id);
        $paciente = $orden->paciente;
        $plantilla = explode('<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>',$orden->plantilla);
       
        $view =  \View::make('pdf.ordengeneradaFondo', compact('orden', 'paciente', 'plantilla'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice'); 
    //    return view('pdf.ordengeneradaFondo', compact('orden', 'paciente', 'plantilla'));
    
    }

}
