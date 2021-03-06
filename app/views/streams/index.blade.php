@section('content')
	
	<div class="form-wrapper margin-tb">
	
		<div class="row">
			{{ Form::open(array('url'=>'streams','class'=>'form')) }}
				
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-body panel-post">
							<textarea placeholder="Write post here..." name="share"></textarea>
						</div>

						<div class="panel-footer clearfix">
							<button type="submit" class="pull-right btn btn-sm btn-success">Share</button>
						</div>
					</div>
				</div>

			{{ Form::close() }}
		</div>
		
		<div class="row">
	
			<div class="col-md-12" id="share-loader">

				@foreach($streams as $stream)
				
					<div class="panel panel-default panel-stream">
						<div class="panel-body">
							<div class="media">
					   			<a class="pull-left stream-profile" href="#" style="width: 64px; height: 64px;">
					   				<span class="glyphicon glyphicon-user"></span>
					      			<!-- <img class="media-object" data-src="" alt="Photo" src="" style="width: 64px; height: 64px;"> -->
					    		</a>
					    	
					        	<div class="media-body">
					          		<h5 class="media-heading"><a href="">{{ $stream->u_nickname }}</a></h5>

					          		{{ $stream->s_stream }}
					          		
									
									<?php 
										$comment = new Comments;
										$comments = $comment->getComments($stream->sid);
									?>
									<hr/>
									
									<div id="stream_{{ $stream->sid }}" class="stream-wrapper">
										@foreach($comments as $comment)

						          		<div class="media stream-item">
						            		<a class="pull-left comment-profile" href="#" style="width: 38px; height: 38px;">
								   				<span class="glyphicon glyphicon-user"></span>
								      			<!-- <img class="media-object" data-src="" alt="Photo" src="" style="width: 64px; height: 64px;"> -->
								    		</a>
						            		<div class="media-body">
						              			<h5 class="media-heading"><a href="">{{ $comment->u_nickname }}</a></h5>
						              			{{ $comment->c_comment }}
						            		</div>
						          		</div>

						          		@endforeach
					          		</div>

					          		<div class="media">
					            		<a class="pull-left comment-profile" href="#" style="width: 38px; height: 38px;">
							   				<span class="glyphicon glyphicon-user"></span>
							      			<!-- <img class="media-object" data-src="" alt="Photo" src="" style="width: 64px; height: 64px;"> -->
							    		</a>
					            		<div class="media-body">
					            			
					            			{{ Form::open(array('url'=>'comments','class'=>'form','method'=>'post')) }}
					            				<div style="display:none">
					            					<input type="text" name="sid" value="{{ $stream->sid }}"/>
					            				</div>
					              				<input type="text" name="comment" class="form-control comment_stream" placeholder="Write your comment here..."/>
					              			
					              			{{ Form::close() }}

					            		</div>
					          		</div>

					          		
					        	</div>
					  		</div>
					
						</div>
					</div>

				@endforeach

			</div>

		</div>

	</div>
@stop;

@section('js')

	yepnope('{{ asset('js/stream.js') }}')

@stop