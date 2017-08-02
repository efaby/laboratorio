<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoPaciente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class TipoPacienteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipopaciente = TipoPaciente::all();

        return view('backEnd.tipopaciente.index', compact('tipopaciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.tipopaciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/']);

        TipoPaciente::create($request->all());

        Session::flash('message', 'TipoPaciente added!');
        Session::flash('status', 'success');

        return redirect('tipopaciente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipopaciente = TipoPaciente::findOrFail($id);

        return view('backEnd.tipopaciente.show', compact('tipopaciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipopaciente = TipoPaciente::findOrFail($id);

        return view('backEnd.tipopaciente.edit', compact('tipopaciente'));
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
        $this->validate($request, ['nombre' => 'required', ]);

        $tipopaciente = TipoPaciente::findOrFail($id);
        $tipopaciente->update($request->all());

        Session::flash('message', 'TipoPaciente updated!');
        Session::flash('status', 'success');

        return redirect('tipopaciente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipopaciente = TipoPaciente::findOrFail($id);

        $tipopaciente->delete();

        Session::flash('message', 'TipoPaciente deleted!');
        Session::flash('status', 'success');

        return redirect('tipopaciente');
    }

}
