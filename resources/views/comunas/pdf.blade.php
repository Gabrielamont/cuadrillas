@extends('layouts.appPdf')

@section('content')

  	<div class="row">
      <div class="col-lg-12">
        <h3 style="border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;padding: 0.5em">Comuna {{$comuna->nombre}}
        </h3>
        <h4>Detalles de la comuna</h4>
        <p><b>Comuna: </b> {{$comuna->nombre}} </p>
        <p><b>Descripcion: </b> {{$comuna->descripcion}} </p>
        <br>
        <table class="table table-bordered table-striped">
            <caption>Consejos Comunales</caption>
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripcion</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach($comuna->cc as $d)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $d->nombre }}</td>
                  <td>{{ $d->descripcion == null ? '---' : $d->descripcion }}</td>
                 
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  
@endsection