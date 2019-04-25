<?php

namespace App\Http\Controllers;

use App\Sectores;
use Illuminate\Http\Request;
use Validator;

class SectoresController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $sectores = new Sectores($request->all());

        if ($sectores->save()) {
            return back()->with([
                'flash_message' => 'Sector creado correctamente.',
                'flash_class'   => 'alert-success',
            ]);
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
        Validator::make($request->all(), [
            'nombre'      => 'required',
            'descripcion' => '',
        ])->validate();

        $sector = Sectores::findOrFail($id)->fill($request->all());

        if ($sector->save()) {
            return back()->with([
                'flash_message' => 'Sector actualizado correctamente.',
                'flash_class'   => 'alert-success',
            ]);
        }
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
}
