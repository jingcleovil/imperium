{{ Form::open(array('url'=>'items/'.$id,'method'=>'put')) }}

@foreach($item as $k=>$v)

<?php 
	$except = array('name_english','')
?>

<div class="form-group">
	<label for="exampleInputEmail1">{{ ucwords(str_replace('_',' ',$k)) }}</label>

	@if(!in_array($k,array('script','description')))
		<input type="text" class="form-control" id="{{ $k }}" name="{{ $k }}" value="{{ $v }}">
	@else
		<textarea class="form-control" name="{{ $k }}">{{ $v }}</textarea>
	@endif
</div>

@endforeach

<button type="submit">Save Changes</button>

{{ Form::close() }}