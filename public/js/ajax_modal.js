$(document).ready(function(){

	$('#grid').on('click','.view_data',function(e){
		
		e.preventDefault();

		var url = $(this).attr('href');
		var m = $('#modal_ajax');

		m.modal();

		$('.modal-title',m).html('Fetching Data');
		$('.modal-body',m).html('Loading...');

		$.getJSON(url,function(data){

			$('.modal-title',m).html(data.title);
			$('.modal-body',m).html(data.content);

		})

	})

})