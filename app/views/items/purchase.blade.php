@section('content')

<div class="form-wrapper margin-tb">
	
	@include('items.items')

	<div class="row">
		<div id="load-more-items"></div>
	</div>

	<div class="row" id="load-items"></div>
</div>

@stop

@section('var')
	
@stop;

@section('css')
	
@stop

@section('js')

	yepnope('{{ asset('js/items.js') }}?v=') + Math.random();

@stop