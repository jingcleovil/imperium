@extends('layouts.master')

@section('sidebar')
	@parent

	@include('widget.menu')
@stop

@section('content')
	<div class="top-bar">
		<a href="" class="btn btn-primary">Login</a>
		<a href="" class="btn btn-success">Register</a>
	</div>

	<div class="title">Imperium Control Panel <div class="sub-title">Cool, fast and easy to use control panel</div></div>

	<div class="panel">
	  <div class="panel-heading">Panel heading</div>
	  Panel content
	</div>

	<div class="panel">
	  <div class="panel-heading">
	    <h3 class="panel-title">Panel title</h3>
	  </div>
	  Panel content
	</div>

@stop