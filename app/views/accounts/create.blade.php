@extend('layouts.master')

@section('content')

	<form>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" class="form-control" id="username" placeholder="Username" name="username">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Your Email</label>
					<input type="email" class="form-control" id="email" placeholder="E-mail Address" name="email">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Your Password</label>
					<input type="password" class="form-control" id="password" placeholder="password" name="username">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Confirm Password</label>
					<input type="password" class="form-control" id="password" placeholder="password" name="username">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Gender</label>
					<select class="form-control">
						<option value=""></option>
						<option value="M">Male</option>
						<option value="F">Male</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="exampleInputEmail1">Birthdate</label>
					<div class="row">
						<div class="col-md-4">
							<select class="form-control">
								<option value=""></option>
							</select>
						</div>
						<div class="col-md-4">
							<select class="form-control">
								<option value=""></option>
							</select>
						</div>
						<div class="col-md-4">
							<select class="form-control">
								<option value=""></option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Create Account</button>
			</div>
		</div>
		

	</form>

@stop

