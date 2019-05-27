@extends('layouts.appPdf')

@section('content')

    <div class="row">
      <div class="col-lg-12">
        <h3 style="border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;padding: 0.5em">
          Sector {{ strtoupper($sector->nombre) }}
        </h3>           
        <div class="col-lg-12">
          <h4>Detalles</h4>
          <p><b>Pertenece al Consejo Comunal </b> {{ strtoupper($sector->consejo->nombre) }} </p>
        </div>
      </div>
    </div>
  
@endsection