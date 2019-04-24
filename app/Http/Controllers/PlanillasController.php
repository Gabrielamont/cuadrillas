<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\ConsejoComunal;
use App\Vocero;use Illuminate\Http\Request;

class PlanillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index";
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
        //dd($request->all());

        $codigo = rand(11111, 99999);

        $acta                = new Planillas;
        $acta->codigo        = 'C' . $codigo;
        $acta->id_user       = Auth::user()->id;
        $acta->id_empresa    = $request->id_empresa;
        $acta->observaciones = $request->observaciones;

        if ($acta->save()) {
            //for participantes
            for ($i = 0; $i < count($request->nombre); $i++) {

                $participante              = new Participantes;
                $participante->codigo_acta = 'AC' . $codigo;
                $participante->nombre      = $request->nombre[$i];
                $participante->apellido    = $request->apellido[$i];
                $participante->cargo       = $request->cargo[$i];
                $participante->email       = $request->email[$i];
                $participante->save();
            } //fin for

            //for acciones
            for ($i = 0; $i < count($request->accion); $i++) {

                $acciones              = new Acciones;
                $acciones->codigo_acta = 'AC' . $codigo;
                $acciones->accion      = $request->accion[$i];
                $acciones->save();
            } //fin for

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
}
