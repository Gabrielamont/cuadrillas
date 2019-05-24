<?php

namespace App\Http\Controllers;

use Validator;
use App\ConsejoComunal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ConsejoComunalController extends Controller
{

    public function index()
    {
        return view("cc.index",[
          "cc" => ConsejoComunal::all()
        ]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
          'nombre'      => 'required',
          'descripcion' => '',
        ])->validate();
      
        $cc = new ConsejoComunal($request->all());
        if ($cc->save()) {
            return back()->with([
              'flash_message' => 'Consejo comunal creado correctamente.',
              'flash_class'   => 'alert-success'
            ]);
        }
    }

    public function show($id)
    {
        $cc = ConsejoComunal::findOrFail($id);

        //dd($cc);

        return view('cc.view',['cc' => $cc]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
          'nombre'      => 'required',
          'descripcion' => '',
        ])->validate();
      
        $cc = ConsejoComunal::findOrFail($id)->fill($request->all());
        
        if ($cc->save()) {
            return back()->with([
              'flash_message' => 'Consejo comunal actualizado correctamente.',
              'flash_class'   => 'alert-success'
            ]);
        }
    }

    public function destroy(ConsejoComunal $consejoComunal)
    {
        //
    }
    
    public function buscarCC($id){
      $data = ConsejoComunal::where("comuna_id", $id)->orderBy("id", "DESC")->get();
      return response()->json($data);
    }
    
    public function pdfCC()
    {
        $cc = ConsejoComunal::all();
        $pdf = PDF::loadView('pdf.ccPdf', compact('cc'));
        return $pdf->stream(date("d-m-Y h:m:s").'.pdf');
    }
}
