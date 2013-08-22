@section('content')

	<h1><span class="glyphicon glyphicon-home"></span> {{ $title }}</h1>
	
	<div class="col-md-12">
		
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li><a href="#">Library</a></li>
		  <li class="active">Data</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">Character Lists</div>
			<div class="panel-body">
				
				<table class="table table-striped table-bordered" id="grid">
			    	<thead>
						<tr>
							<th width="3%">Show</th>
							<th width="8%">Char ID</th>
							<th width="8%">Account ID</th>
							<th width="30%">Name</th>
							<th>Str</th>
							<th>Vit</th>
							<th>Agi</th>
							<th>Int</th>
							<th>Dex</th>
							<th>Luk</th>
							<th>Points</th>
							<th width="15%">Job</th>
							
						</tr>
					</thead>
					<tbody>
						
						
					</tbody>    
			    </table>


			</div>
		</div>
	</div>
	

	


@stop

@section('var')
	var unsortable_cols = [0];
	var action_url = 'lists';
@stop;

@section('css')
	{{ stylesheet('jquery.dataTables.css') }}
	{{ stylesheet('DT_table.css') }}
@stop

@section('js')

	yepnope('{{ asset('js/jquery.dataTables.min.js') }}');
	yepnope('{{ asset('js/table.js') }}');

@stop