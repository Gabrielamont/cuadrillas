@if(Session::has('flash_message'))
	<div class="row">
	  <div class="col-md-12">
	    <div class="alert {{ Session::get('flash_class') }} {{ Session::has('flash_important') ? 'alert-important':'' }}">
	      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	      <strong class="text-center">{{Session::get('flash_message')}}</strong> 
	  	</div>
	  </div>
	</div>
@endif
@if (count($errors) > 0)
<div class="row">	
	<div class="col-md-12">
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>  
		</div>
	</div>
</div>
@endif