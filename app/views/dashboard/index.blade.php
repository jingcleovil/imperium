@section('content')
<div class="form-wrapper margin-tb">
	<div class="row">
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Character Stats</div>
				<div class="panel-body">
					<div id="characterStats" style="height: 300px"></div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">General Reports</div>
				<ul class="list-group">
						<li class="list-group-item">
							<span class="badge">{{ number_format($totalAccounts) }}</span>
							Account
						</li>
						<li class="list-group-item">
							<span class="badge">{{ number_format($totalZeny) }}</span>
							Total Male
						</li>
						<li class="list-group-item">
							<span class="badge">{{ number_format($totalZeny) }}</span>
							Total Female
						</li>
						<li class="list-group-item">
							<span class="badge">{{ number_format($totalCharacters) }}</span>
							Characters
						</li>
						<li class="list-group-item">
							<span class="badge">{{ number_format($totalGuilds) }}</span>
							Guilds
						</li>
						<li class="list-group-item">
							<span class="badge">{{ number_format($totalZeny) }}</span>
							Zeny
						</li>
						<li class="list-group-item">
							<span class="badge">{{ number_format($totalZeny) }}</span>
							Online Users
						</li>
					</ul>
				
			</div>
		</div>

		

	<!-- 	<div class="col-md-6">
			<div class="panel panel-default">
			  <div class="panel-heading">Total Users</div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
			  <div class="panel-heading">Total Users</div>
			  <div class="panel-body">
			    Panel content
			  </div>
			</div>
		</div>
 -->

	</div>
</div>

@stop

@section('var')
	
@stop;

@section('css')
	
@stop

@section('js')

	yepnope('{{ asset('js/highcharts.js') }}');
	yepnope('{{ asset('js/graph.js') }}?v=2');

@stop