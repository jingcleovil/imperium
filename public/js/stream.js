$(document).ready(function(){

	$('.comment_stream').keydown(function(e){
		if(e.which == 13)
		{
			var form = $(this).parent();

			$(form).trigger('submit');
		}
	})
})