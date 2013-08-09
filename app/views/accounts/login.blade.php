@extends('layouts.master')

@section('sidebar')
	@parent

	@include('widget.menu')
@stop

@section('content')
	@include('widget.menu_top')

	<div class="title">
		
		{{ $ptitle }} 
		
		<div class="sub-title"> 
			{{ $stitle }}
		</div>

	</div>

	<div class="page-widget">
		<div class="generic-form">
			<?php if(isset($errors) && $errors && strlen($errors) > 2) { echo $errors; }?> 
				
			<form class="form-hor" method="post" action="{{ url('login') }}">

				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Login Your Account</h3>
					</div>

			
					<div class="response"></div>
					
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
						<label for="inputEmail" class="col-lg-2 control-label">&nbsp;</label>
						<div class="col-lg-offset-2 col-lg-10">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>

@stop