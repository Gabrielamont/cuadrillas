<?php

namespace App\Http\Controllers;

use App\{Comuna, ConsejoComunal, Vocero};
use Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("comunas.index", [
          "comunas" => Comuna::all(),
          "cc"      => ConsejoComunal::all(),
          "voceros" => Vocero::all(),
        ]);
    }
    
    public function pdfComuna()
    {
        $comunas = Comuna::all();
        $pdf = PDF::loadView('pdf.comunaPdf', compact('comunas'));
        return $pdf->stream(date("d-m-Y h:m:s").'.pdf');
    }

    public function pdf($id)
    {
        $comuna = Comuna::findOrFail($id);
        $pdf = PDF::loadView('comunas.pdf',['comuna' => $comuna]);
        return $pdf->stream(date("d-m-Y h:m:s").$comuna->nombre.'.pdf');
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
          'nombre'      => 'required',
          'descripcion' => '',
        ])->validate();
      
        $comuna = new Comuna($request->all());
        
        if ($comuna->save()) {
            return back()->with([
              'flash_message' => 'Comuna creada correctamente.',
              'flash_class' => 'alert-success'
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
          'nombre'      => 'required',
          'descripcion' => '',
        ])->validate();
      
        $comuna = Comuna::findOrFail($id)->fill($request->all());
        
        if ($comuna->save()) {
            return back()->with([
              'flash_message' => 'Comuna actualizada correctamente.',
              'flash_class' => 'alert-success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comuna $comuna)
    {
        //
    }

    public function show($id)
    {
        $comuna = Comuna::findOrFail($id);

        return view('comunas.view',['comuna' => $comuna]);
    }
}
