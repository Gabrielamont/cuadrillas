@extends('layouts.appPdf')

@section('content')

  	<div class="row">
      <div class="col-sm-12">
        <h3 style="border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;padding: 0.5em">Comunas</h3>
        <br>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Descripcion</th>
              <th class="text-center">Consejos comunales</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comunas as $d)
              <tr class="text-center">
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $d->nombre }}</td>
                <td>{{ $d->descripcion }}</td>
                <td>{{ $d->ccTotal() }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  
@endsection