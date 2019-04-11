@extends('layouts.appPdf')

@section('content')

  	<div class="row">
      <div class="col-sm-12">
        <h3 style="border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;padding: 0.5em">
          Voceros
        </h3>
        <br>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Cedula</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Apellido</th>
              <th class="text-center">Telefono</th>
              <th class="text-center">C.C.</th>
            </tr>
          </thead>
          <tbody>
            @foreach($voceros as $d)
              <tr class="text-center">
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $d->cedula }}</td>
                <td>{{ $d->nombre }}</td>
                <td>{{ $d->apellido }}</td>
                <td>{{ $d->telefono ? $d->telefono : '---' }}</td>
                <td>{{ $d->cc->nombre }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  
@endsection