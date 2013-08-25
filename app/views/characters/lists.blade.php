<div class="row">
@foreach($chars as $char)
	
	
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $char->name }}</div>
				<div class="panel-body">
					
					<div class="char-body">
						<?php if(file_exists(public_path('images/jobs/'.$char->sex.'/'.$char->class.'.png'))) {?> 
								<img src="{{ asset('images/jobs/'.$char->sex.'/'.$char->class.'.png') }}"/>
						<? } ?>
					</div>

				</div>
			</div>
		</div>
	
@endforeach
</div>
