@extends('layouts.appPdf')

@section('content')

    <div class="row">
      <div class="col-lg-12">
        <h3 style="border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;padding: 0.5em">
          Consejo Comunal {{ strtoupper($cc->nombre) }}
        </h3>           
        <div class="col-lg-12">
          <h4>Detalles</h4>
          <p><b>Pertenece a la Comuna </b> {{ strtoupper($cc->comuna->nombre) }} </p>
        </div>
        <br>
        <div class="col-lg-12">
            <table class="table table-bordered table-striped">
                <caption>Sectores</caption>
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Descripcion</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cc->sectores as $d)
                  <tr class="text-center">
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->descripcion == null ? '---' : $d->descripcion }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  
@endsection