@section('content')

<h1><span class="glyphicon glyphicon-home"></span> {{ $title }}</h1>

<div class="form-wrapper margin-tb">
	<div class="row">
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Login Your Account Here</div>
				<div class="panel-body">


					<div class="col-md-6">
						
						{{ Form::open(array('url'=>'accounts/auth')) }}
							
							@if (Session::has('login_errors'))
								<div class="alert alert-danger">
									Username or password incorrect.
								</div>
					  		@endif

							<div class="form-group">
								<label for="exampleInputEmail1">Username</label> 
								<input type="text" class="form-control" placeholder="Username" name="userid">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label> 
								<input type="password" class="form-control" placeholder="Password" name="user_pass">
							</div>
							
							<button type="submit" class="btn btn-primary">Log Me In</button>

						{{ Form::close() }}

					</div>

				</div> 
			</div>
		</div>

	</div>
</div>

@stop

@section('var')
	
@stop;

@section('css')
	
@stop

@section('js')

	yepnope('{{ asset('js/highcharts.js') }}');
	yepnope('{{ asset('js/graph.js') }}?v=2');

@stop