@extend('layouts.master')

@section('content')

	<div class="page-header">
	    <h3>Create Account <small>Create your account and you're ready to go!</small></h3>
	</div>

	<form>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Your Username</label>
					<input type="text" class="form-control" id="username" placeholder="Username" name="username">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Your Password</label>
					<input type="password" class="form-control" id="password" placeholder="password" name="username">
				</div>
			</div>
		</div>

	
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
		

	</form>

@stop

