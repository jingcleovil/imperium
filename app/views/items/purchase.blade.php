@section('content')

<div class="form-wrapper margin-tb">
	<div class="row">
		
		@foreach($items as $item)
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $item->name_japanese }}</div>
				<div class="panel-body">
						
					<div class="media">
			        <a class="pull-left" href="#">
						@if(file_exists('./images/items/large/'.$item->id.'.gif'))
			         		<img class="media-object" src="{{ asset('images/items/large/'.$item->id.'.gif') }}" alt="64x64" src="">
			        	@else
							<img class="media-object" src="{{ asset('images/no-img.jpg') }}" alt="64x64" src="">
			        	@endif
			        </a>
			        <div class="media-body">
			          {{ substr($item->description,0,100) }}...
						
						<div class="row">
							<div class="col-md-12">
					          	<div class="btn-group btn-group-xs pull-right">
						          <button type="button" class="btn btn-primary">Share</button>
						          <button type="button" class="btn btn-default">Purchase</button>
						        </div>
					        </div>
				        </div>
			        </div>
			      </div>

				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>

@stop

@section('var')
	
@stop;

@section('css')
	
@stop

@section('js')

	
@stop