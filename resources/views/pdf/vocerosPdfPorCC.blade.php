@extends('layouts.appPdf')

@section('content')

    <div class="row">
      <div class="col-lg-12">
        <h3 style="border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;padding: 0.5em">
            Voceros del Consejo Comunal {{ strtoupper($cc->nombre) }}
        </h3>
        <table class="table table-bordered table-striped">
            <caption>Voceros</caption>
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Telefono</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach($voceros as $d)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $d->cedula }}</td>
                  <td>{{ $d->nombre }}</td>
                  <td>{{ $d->apellido }}</td>
                  <td>{{ $d->telefono }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  
@endsection