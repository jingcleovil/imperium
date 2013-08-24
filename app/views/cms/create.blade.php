@section('content')

 <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>

<div class="form-wrapper margin-tb">
	<div class="row">
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Create Page</div>
				<div class="panel-body">


					<div class="col-md-12">
						
						{{ Form::open(array('url'=>'cms','class'=>'form','method'=>'post')) }}
							
							<div class="response"></div>

							<div class="form-group">
								<label for="exampleInputEmail1">Page Title</label> 
								<input type="text" class="form-control" name="page_title" placeholder="Username" name="userid">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Page Content</label> 
								<textarea name="page_content" class="form-control" style="height: 250px"></textarea>
							</div>

							<button type="submit" class="btn btn-success">Create page</button>

						{{ Form::close() }}

					</div>

				</div> 
			</div>
		</div>

	
	</div>
</div>

@stop

@section('var')
	
@stop;

@section('css')
	
@stop

@section('js')

@stop