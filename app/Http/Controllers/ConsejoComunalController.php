<?php

namespace App\Http\Controllers;

use Validator;
use App\ConsejoComunal;
use Illuminate\Http\Request;

class ConsejoComunalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cc.index",[
          "cc" => ConsejoComunal::all()
        ]);
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
      
        $cc = new ConsejoComunal($request->all());
        if ($cc->save()) {
            return back()->with([
              'flash_message' => 'Consejo comunal creado correctamente.',
              'flash_class'   => 'alert-success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConsejoComunal  $consejoComunal
     * @return \Illuminate\Http\Response
     */
    public function show(ConsejoComunal $consejoComunal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsejoComunal  $consejoComunal
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConsejoComunal  $consejoComunal
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsejoComunal $consejoComunal)
    {
        //
    }
}
