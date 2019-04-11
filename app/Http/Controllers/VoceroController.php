<?php

namespace App\Http\Controllers;

use Validator;
use App\Vocero;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class VoceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function pdfVocero()
    {
        $voceros = Vocero::all();
        $pdf = PDF::loadView('pdf.vocerosPdf', compact('voceros'));
        return $pdf->stream(date("d-m-Y h:m:s").'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
          'cedula'        => 'required|unique:voceros',
          'nombre'        => 'required',
          'apellido'      => 'required',
          'telefono'      => '',
        ])->validate();
      
        for ($i = 0; $i < count($request->cedula); $i++) {
          Vocero::create([
            'cedula'    => $request->cedula[$i], 
            'nombre'    => $request->nombre[$i], 
            'apellido'  => $request->apellido[$i], 
            'telefono'  => $request->telefono[$i], 
            'cc_id'     => $request->cc_id, 
          ]);      
        }
        
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vocero  $vocero
     * @return \Illuminate\Http\Response
     */
    public function show(Vocero $vocero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vocero  $vocero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
          'cedula'        => 'required|unique:voceros,id,'.$id.',id',
          'nombre'        => 'required',
          'apellido'      => 'required',
          'telefono'      => '',
        ])->validate();
      
        $v = Vocero::findOrFail($id)->fill($request->all());
        
        if ($v->save()) {
            return back()->with([
              'flash_message' => 'Vocero actualizado correctamente.',
              'flash_class'   => 'alert-success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vocero  $vocero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vocero $vocero)
    {
        //
    }
}
