<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\ConsejoComunal;
use App\Participantes;
use App\Planillas;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PlanillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planillas = Planillas::all();

        return view('planillas.index', ['planillas' => $planillas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consejo = ConsejoComunal::all();
        $comuna  = Comuna::all();

        return view('planillas.create', ['consejo' => $consejo, 'comuna' => $comuna]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $codigo = rand(11111, 99999);

        $planilla         = new Planillas;
        $planilla->codigo = 'C' . $codigo;
        //$planilla->id_user       = Auth::user()->id;
        $planilla->cc_id     = $request->cc_id;
        $planilla->comuna_id = $request->comuna_id;
        $planilla->sector_id = $request->sector_id;

        if ($planilla->save()) {
            //for participantes
            for ($i = 0; $i < count($request->nombre); $i++) {

                $participante              = new Participantes;
                $participante->planilla_id = $planilla->id;
                $participante->nombre      = $request->nombre[$i];
                $participante->apellido    = $request->apellido[$i];
                $participante->telefono    = $request->telefono[$i];
                $participante->correo      = $request->correo[$i];
                $participante->save();
            } //fin for

            // //for acciones
            // for ($i = 0; $i < count($request->accion); $i++) {

            //     $acciones              = new Acciones;
            //     $acciones->codigo_acta = 'AC' . $codigo;
            //     $acciones->accion      = $request->accion[$i];
            //     $acciones->save();
            // } //fin for

            return response()->json(['msg' => 'Se registro correctamente']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planilla = Planillas::findOrfail($id);

        $participantes = Participantes::where('planilla_id', $id)->get();

        return view('planillas.show', ['planilla' => $planilla, 'participantes' => $participantes]);
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

        $participantes = Participantes::where('planilla_id', $id);

        $planilla = Planillas::findOrFail($id);

        if ($participantes->delete() && $planilla->delete()) {
            return redirect('planillas')->with([
                'flash_class'   => 'alert-success',
                'flash_message' => 'Cuadrilla eliminada con exito.',
            ]);
        } else {
            return redirect('planillas')->with([
                'flash_class'     => 'alert-danger',
                'flash_message'   => 'Ha ocurrido un error.',
                'flash_important' => true,
            ]);
        }
    }

    public function comunas($id)
    {
        $comunas = Comuna::find($id)->cc;

        return response()->json($comunas);
    }

    public function consejo($id)
    {
        $consejo = ConsejoComunal::find($id);

        return response()->json($consejo);
    }

    public function sector($id)
    {
        $consejo = ConsejoComunal::find($id)->sectores;

        return response()->json($consejo);
    }
    public function pdf($id)
    {
        $planilla = Planillas::findOrfail($id);

        // $voceros = Vocero::where('cc_id', $planilla->consejo->id)->get();

        // dd($voceros);

        $participantes = Participantes::where('planilla_id', $id)->get();

        $pdf = PDF::loadView('pdf.pdfCuadrilla', ['planilla' => $planilla, 'participantes' => $participantes]);
        return $pdf->stream($planilla->codigo . '.pdf');
    }
}
