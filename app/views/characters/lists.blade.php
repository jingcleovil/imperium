<div class="row">

<?php 
	$maxStats = Config::get('ragnarok.ServerInfo.Server1.maxStats');
?>

@foreach($chars as $char)
	
	
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $char->name }}</div>
				<div class="panel-body">
					<div class="equipwin">
						<div class="char-body">
							<?php if(file_exists(public_path('images/jobs/'.$char->sex.'/'.$char->class.'.png'))) {?> 
									<img src="{{ asset('images/jobs/'.$char->sex.'/'.$char->class.'.png') }}"/>
							<? } ?>
						</div>
					</div>
				</div>
				
				<ul class="list-group char-stats">
					<li class="list-group-item clearfix">
						<div class="col-md-2 col-xs-6">
							STR
						</div>
						<div class="col-md-10 col-xs-6">
							<div class="progress">
								<div class="progress-bar progress-bar-success" style="width: {{ ($char->str / $maxStats) * 100 }}%"></div>
							</div>
						</div>
					</li>
					<li class="list-group-item clearfix">
						<div class="col-md-2 col-xs-6">
							AGI
						</div>
						<div class="col-md-10 col-xs-6">
							<div class="progress">
								<div class="progress-bar progress-bar-success" style="width: {{ ($char->agi / $maxStats) * 100 }}%">
								</div>
							</div>
						</div>
					</li>
					<li class="list-group-item clearfix">
						<div class="col-md-2 col-xs-6">
							VIT
						</div>
						<div class="col-md-10 col-xs-6">
							<div class="progress">
								<div class="progress-bar progress-bar-success" style="width: {{ ($char->vit / $maxStats) * 100 }}%"></div>
							</div>
						</div>
					</li>
					<li class="list-group-item clearfix">
						<div class="col-md-2 col-xs-6">
							INT
						</div>
						<div class="col-md-10 col-xs-6">
							<div class="progress">
								<div class="progress-bar progress-bar-success" role="progressbar" style="width: {{ ($char->int / $maxStats) * 100 }}%">
								</div>
							</div>
						</div>
					</li>
					<li class="list-group-item clearfix">
						<div class="col-md-2 col-xs-6">
							DEX
						</div>
						<div class="col-md-10 col-xs-6">
							<div class="progress">
								<div class="progress-bar progress-bar-success" style="width: {{ ($char->dex / $maxStats) * 100 }}%">
								</div>
							</div>
						</div>
					</li>
					<li class="list-group-item clearfix">
						<div class="col-md-2 col-xs-6">
							LUK
						</div>
						<div class="col-md-10 col-xs-6">
							<div class="progress">
								<div class="progress-bar progress-bar-success" style="width: {{ ($char->luk / $maxStats) * 100 }}%">
								</div>
							</div>
						</div>
					</li>
				</ul>

			</div>
		</div>
	
@endforeach
</div>
