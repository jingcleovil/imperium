<div class="row">
	
	@foreach($items as $item)

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $item->name_japanese }} ( {{ number_format($item->donate_cost,2) }} )</div>
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
		
			        </div>
			      </div>

				</div>

				<ul class="list-group">
					<li class="list-group-item">
						<span class="badge">{{ $item->donate_cost }}</span>
						Cost
					</li>
					<li class="list-group-item">
						<span class="badge">{{ $item->equip_level }}</span>
						Equip Level
					</li>
					<li class="list-group-item clearfix">
						<div class="btn-group btn-group-xs pull-right">
				          <button type="button" class="btn btn-primary">Share</button>
				          <button type="button" class="btn btn-default">Purchase</button>
				        </div>
					</li>
				</ul>
			</div>
		</div>

	@endforeach
</div>