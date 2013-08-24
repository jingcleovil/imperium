<?php 
	$SubMenus = Config::get('ragnarok.SubMenus');
	$SubMenu = null;

	if(!isset($module)) $module = '';

	if( isset($SubMenus[$module]))
	{
		$SubMenu = $SubMenus[$module];
	}
?>

@if($SubMenu)
	<div class="col-md-12">
		<ol class="breadcrumb">
			@foreach($SubMenu as $key=>$menu)
			
				<li>
					{{ Request::path()." ". $menu['module']." ".$menu['action'] }}
				</li>

			@endforeach
		</ol>		
	</div>
@endif