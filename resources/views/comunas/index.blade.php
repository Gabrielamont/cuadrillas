@extends('layouts.app')
@section('title','Comunas - '.config('app.name'))
@section('header','Comunas')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li class="active"> Comunas </li>
	</ol>
@endsection
@section('content')
	@include('partials.flash')
	<!-- Info boxes -->
  <div class="row">
  	<div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Comunas</span>
          <span class="info-box-number">{{ count($comunas) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div><!--row-->

	<div class="row">
  	<div class="col-md-12">
    	<div class="box box-danger">
	      <div class="box-header with-border">
	        <h3 class="box-title"><i class="fa fa-users"></i> Comunas</h3>
	        <span class="pull-right">
						<a href="{{ route('comunas.create') }}" class="btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nueva comuna</a>
					</span>
	      </div>
      			<div class="box-body">
					<table class="table data-table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Nombre</th>
								<th class="text-center">Descripcion</th>
								<th class="text-center">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($comunas as $d)
								<tr>
									<td>{{$loop->index+1}}</td>
									<td>{{$d->nombre}}</td>
									<td>{{$d->descripcion}}</td>
									<td>
										<a class="btn btn-primary btn-flat btn-sm" href="{{ route('comunas.show',[$d->id])}}"><i class="fa fa-search"></i></a>
										<!-- <a href="{{route('users.edit',[$d->id])}}" class="btn btn-flat btn-success btn-sm" title="Editar"><i class="fa fa-edit"></i></a> -->
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
