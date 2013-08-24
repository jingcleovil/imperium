var procJSON = {
	'retry' : function(data,form)
	{
		var html = [];

		html.push('<div class="alert alert-danger"><ul>');

		$.each(data.errors, function(i,n){
			html.push(n)
		})
		
		html.push('</ul></div>');
		$('.response', form).html('').html(html.join(""));
	},
	'forward' : function(data,form)
	{
		if(data.url)
			location.href=data.url
	},
	'share_fail' : function(data,form)
	{

	},
	'share_success' : function(data,form)
	{
		$(form).trigger('reset');

		$('#share-loader').prepend(data.content);

		$('.new-stream').slideDown('fast',function(){
			$(this).removeClass('new-stream');
		})
	},
	'comment_success' : function(data,form) 
	{
		$('#stream_'+data.sid).prepend(data.content);
		$('input[name=comment]', form).val('');
	}
}

$(document).ready(function(){


	$('.form').on('submit', function(e){
		e.preventDefault();

		var form = this,
		 	data = $(form).serializeArray(),
		 	act  = $(form).attr('action'),
		 	text = $('button[type=submit]', form).text();

		 $('button[type=submit]', form).text('Loading...');

		$.ajax({
			url: act,
			data: data,
			dataType: 'json',
			type: 'post',
			success: function(dt)
			{
				try
				{
					procJSON[dt.action](dt,form);	
					$('button[type=submit]').text(text);
				}
				catch(e)
				{
					console.log(e.message);
				}
			},
			error: function(xhr)
			{
				$('button[type=submit]').text(text);	
			}
		})
	});
	
})