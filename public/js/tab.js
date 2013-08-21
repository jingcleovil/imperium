$(document).ready(function(){

	$('.jing-tab').on('click','a',function(e){
		e.preventDefault();

		var  parent = $(this).parent()
			,idx = parent.index(); 

		$(parent).addClass('active');
		$(parent).siblings().removeClass('active');

		$('.tab-viewer').find('.tab-pane').eq(idx).addClass('tab-pane-active');
		$('.tab-viewer').find('.tab-pane').eq(idx).siblings().removeClass('tab-pane-active');

	})

})