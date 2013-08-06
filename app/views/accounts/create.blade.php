@extends('layouts.master')

@section('sidebar')
	@parent

	@include('widget.menu')
@stop

@section('content')


	<div class="title">
		
		{{ $ptitle }} 
		
		<div class="sub-title"> 
			{{ $stitle }}
		</div>

	</div>

	<div class="page-widget">
		<div class="generic-form">
			<?php if(isset($errors) && $errors && strlen($errors) > 2) { echo $errors; }?> 
				
			<form class="form-hor form" method="post" action="{{ action('AccountsController@store') }}">
				
				<div class="form-group">
					<label for="username" class="col-lg-2 control-label">Username</label>
					<div class="col-lg-6">
				  		<input type="text" class="form-control" name="username" id="username">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-lg-2 control-label">Password</label>
					<div class="col-lg-6">
				  		<input type="password" class="form-control" name="password" id="password">
					</div>
				</div>

				<div class="form-group">
					<label for="confpassword" class="col-lg-2 control-label">Confirm Password</label>
					<div class="col-lg-6">
				  		<input type="password" class="form-control" name="confirmpassword" id="confpassword">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-lg-2 control-label">E-mail Address</label>
					<div class="col-lg-6">
				  		<input type="text" class="form-control" name="email" id="email">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-lg-2 control-label">Gender</label>
					<div class="col-lg-10 clearfix">
				  		<label class="radio-inline">
							<input type="radio" id="inlineCheckbox1" name="gender" value="option1"> Male
						</label>
						<label class="radio-inline">
							<input type="radio" id="inlineCheckbox2" name="gender" value="option2"> Female ?
						</label>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-lg-2 control-label">Birtdate</label>
					<div class="col-lg-2 clearfix">
				  		<select class="form-control">
				  			<option></option>
				  		</select>
					</div>
					
					<div class="col-lg-2 clearfix">
				  		<select class="form-control">
				  			<option></option>
				  		</select>
					</div>
					
					<div class="col-lg-2 clearfix">
				  		<select class="form-control">
				  			<option></option>
				  		</select>
					</div>
				</div>
				<br/>
				
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">&nbsp;</label>
					<div class="col-lg-offset-2 col-lg-10">
						<button type="submit" class="btn btn-primary">Create My Account</button>
					</div>
				</div>

			</form>
		</div>
	</div>

@stop