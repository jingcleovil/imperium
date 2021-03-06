@foreach($streams as $stream)
				
<div class="panel panel-default panel-stream new-stream">
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

				@foreach($comments as $comment)

          		<div class="media">
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

          		<div class="media">
            		<a class="pull-left comment-profile" href="#" style="width: 38px; height: 38px;">
		   				<span class="glyphicon glyphicon-user"></span>
		      			<!-- <img class="media-object" data-src="" alt="Photo" src="" style="width: 64px; height: 64px;"> -->
		    		</a>
            		<div class="media-body">
              			<input type="text" class="form-control" placeholder="Write your comment here..."/>
            		</div>
          		</div>

          		
        	</div>
  		</div>

	</div>
</div>

@endforeach