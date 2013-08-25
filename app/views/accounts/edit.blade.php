@section('content')

<div class="form-wrapper margin-tb">
	<div class="row">
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">


					<div class="col-md-12">
						
						{{ Form::open(array('url'=>'accounts/'.$id,'method'=>'patch','class'=>'form')) }}
							
							<div class="response"></div>

							<div style="display:none">
								<input type="text" value="{{$user['account_id']}}" name="account_id"/>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Group ID</label> 
								<input type="text" class="form-control" placeholder="Group ID" name="group_id" value="{{$user['group_id']}}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label> 
								<input type="text" class="form-control" placeholder="Username" name="username" value="{{$user['userid']}}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label> 
								<input type="password" class="form-control" placeholder="Leave blank if no intention to change" name="password">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">E-mail</label> 
								<input type="text" class="form-control" placeholder="E-mail" name="email" value="{{ $user['email'] }}">
							</div>
	
							<div class="form-group">
								<label for="exampleInputPassword1">Birthdate</label> 
								<input type="text" class="form-control" placeholder="E-mail" name="birthdate" value="{{ $user['birthdate'] }}">
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
								<label for="exampleInputPassword1">Gender</label> 
								<select name="gender" class="form-control">
									<option value="M">Male</option>
									<option value="F">Female</option>
								</select>
							</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
								<label for="exampleInputPassword1">State</label> 
								<select name="state" class="form-control">
									<option value="0">Normal</option>
									<option value="5">Permanently Banned</option>
								</select>
							</div>
								</div>
							</div>

							<button type="submit" class="btn btn-success">Update</button>

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


@stop