var moreItems, loadItems, rp, page;

skip = 0;

loadItems = true;

var moreItems = function()
{
	skip++

	$.post(root + '/items/purchase', {skip:skip}, function(html){
		
		$('#load-more-items').prepend(html.content);
		loadItems = true;

	},'json');
}

$(window).scroll(function(){
	var spoted = isSpoted('#load-items');
	
	if(spoted)
	{
		if(loadItems)
		{
			loadItems = false;
			console.log('load more');

			moreItems();

		}
	}
})