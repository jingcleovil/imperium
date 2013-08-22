@section('content')
	
	<div class="col-md-12">	
		<ul class="nav nav-tabs nav-justified jing-tab">
			<li class="active">
				<a href="">Account Information</a>
			</li>
			<li>
				<a href="">Account Storage</a>
			</li>
			<li>
				<a href="{{ url('characters/lists/'.$user['account_id']) }}" data-get="character">Characters</a>
			</li>
		</ul>
	</div>

	<div class="clearfix"></div>

	<div class="tab-viewer">
		
		<!-- Account Pane -->
		<div class="col-md-12 tab-pane tab-pane-active">
			<div class="panel">
			  	<div class="panel-body">
			  		<ul class="list-group">
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								Account ID
							</div>
							<div class="col-md-10 col-xs-6">
								{{ $user['account_id'] }}
							</div>
						</li>
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								Group ID
							</div>
							<div class="col-md-10 col-xs-6">
								{{ $user['group_id'] }}
							</div>
						</li>
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								E-mail Address
							</div>
							<div class="col-md-10 col-xs-6">
								{{ $user['email'] }}
							</div>
						</li>
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								Birthdate
							</div>
							<div class="col-md-10 col-xs-6">
								{{ date('F d, Y',strtotime($user['birthdate'])) }}
							</div>
						</li>
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								Gender
							</div>
							<div class="col-md-10 col-xs-6">
								{{ $user['sex'] === 'M' ? 'Male' : 'Female' }}
							</div>
						</li>
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								Last Login
							</div>
							<div class="col-md-10 col-xs-6">
								{{ $user['lastlogin'] }}
							</div>
						</li>
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								Last IP
							</div>
							<div class="col-md-10 col-xs-6">
								{{ $user['last_ip'] === '' ? '-' : $user['last_ip'] }}
							</div>
						</li>
						<li class="list-group-item clearfix">
							<div class="col-md-2 col-xs-6">
								Account State
							</div>
							<div class="col-md-10 col-xs-6">
								{{ $user['state'] }}
							</div>
						</li>
					</ul>
			  	</div>
			</div>
		</div>

		<!-- Storage Pane -->
		<div class="col-md-12 tab-pane">
			<div class="panel">
			  	<div class="panel-body">
			  		<table class="table table-striped table-bordered" id="grid">
				    	<thead>
							<tr>
								<th width="5%">ID</th>
								<th width="5%">Icon</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Expired</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
						
						</tbody>    
				    </table>
			  	</div>
			</div>
		</div>

		<!-- Characters Pane -->
		<div class="col-md-12 tab-pane">
			<div class="panel">
			  	<div class="panel-body" data-view="character">
			  		
			  	</div>
			</div>
		</div>

	</div>
	
@stop

@section('modal')
	@include('main.modal.modal_ajax')
@stop

@section('css')
	{{ stylesheet('jquery.dataTables.css') }}
	{{ stylesheet('DT_table.css') }}
@stop

@section('js')

	yepnope('{{ asset('js/tab.js') }}?=v1')
	yepnope('{{ asset('js/jquery.dataTables.min.js') }} ')
	yepnope('{{ asset('js/table.js') }}?v=1')
	yepnope('{{ asset('js/ajax_modal.js') }}?v=1')

@stop

@section('var')
	unsortable_cols = [0,1];
	action_url = 'storage';
	autoload = 10;
	param = {'name':'account_id','value':'{{ $user['account_id'] }}'};
@stop