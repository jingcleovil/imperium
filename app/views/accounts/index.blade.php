@section('content')
	

	<div class="col-md-12">
		
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li><a href="#">Library</a></li>
		  <li class="active">Data</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">Account Lists</div>
			<div class="panel-body">
				
				<table class="table table-striped table-bordered" id="grid">
			    	<thead>
						<tr>
							<th width="5%">#</th>
							<th>Account ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Last IP</th>
							<th>Last Login</th>
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