<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\Paciente;

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
        return view('backEnd.orden.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    	$data = paciente::where('cedula','LIKE','%'.$term.'%')
    	->take(10)
    	->get();
    	$result=array();
    	foreach ($data as $query)
    	{
    		$result[] = [ 'id' => $query->id, 'nombres' => $query->nombres.' '.$query->apellidos ];
    	}
    	
    	
    	 
    	
    	
    	/*$data = DB::table('pacientes')
    	->where('cedula', 'LIKE', '%'.$term.'%')
    	->get();
    	
    	/*foreach ($queries as $query)
    	{
    		$results[] = [ 'id' => $query->id, 'value' => $query->first_name.' '.$query->last_name ];
    	}*/
    	dd($result);
    	return response()->json($results);    	     	
    }
}