@section('content')

<h1><span class="glyphicon glyphicon-home"></span> {{ $title }}</h1>

<div class="form-wrapper margin-tb">
	<div class="row">
		
		<div class="col-md-6">
			<div class="panel panel-default">
			  <div class="panel-heading">Information for {{Config::get('ragnarok.ServerInfo.ServerName')}}</div>
			  <div class="panel-body">
			    
			    <ul class="list-group">
				  
					<li class="list-group-item">
						<span class="badge">14</span>
						Total Account
					</li>

					<li class="list-group-item">
						<span class="badge">14</span>
						Total Account
					</li>

				</ul>

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

		<div class="col-md-6">
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


	</div>
</div>

@stop