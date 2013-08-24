@section('content')
	
	<div class="col-md-12">
		
		

		<div class="panel panel-default">
			<div class="panel-heading">Account Lists</div>
			<div class="panel-body">
				
				<table class="table table-striped table-bordered" id="grid">
			    	<thead>
						<tr>
							<th width="5%"></th>
							<th width="5%"></th>
							<th>Page Title</th>
							<th>Created By</th>
							<th>Created On</th>					
						</tr>
					</thead>
					<tbody>
						
						
					</tbody>    
			    </table>


			</div>
		</div>
	</div>

@stop

@section('modal')
	@include('main.modal.modal_delete')
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
	yepnope('{{ asset('js/table.js') }}?v='+Math.random());

@stop