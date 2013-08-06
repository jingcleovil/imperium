var form = $('.form');

var procJSON = {
	retry : function(data,form)
	{
		var html = [];
		var errors = data.errors;

		html.push("<div class=\"alert alert-danger\">");

		$.each(errors,function(i,n){
			html.push(n);
		});

		html.push("</div>");

		$('.response',form).prepend(html.join(""));
	},
	success: function(data,form)
	{
		$(form).trigger('reset');
	}
}

$(document).ready(function(handler){

	$(document).ajaxStart(function(){
		$('.preloader').show();
	});

	$(document).ajaxStop(function(){
		$('.preloader').hide();
	});

	form.submit(function(e){
		e.preventDefault();

		var frm = $(this),
		    dt = frm.serializeArray(),
		    action = frm.attr('action');

		$('.response',frm).empty();

		$.ajax({
			url: action,
			data: dt,
			dataType: 'json',
			type: 'post',
			success: function(data)
			{
				try
				{
					procJSON[data.action](data,frm);
				}
				catch(e)
				{
					console.log(e.message);
				}

			}
			,error: function(xhr)
			{
				console.log(xhr.responseText);
				$('.preloader').hide();
			}
		})
	})

});