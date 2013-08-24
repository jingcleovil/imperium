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

		<li class="{{ Request::is('cms*') ? 'active' : '' }}">
			<a href="{{ url($menu['module']."/".$menu['action']) }}">{{ $key }}</a>
		</li>

		@endforeach
	</ol>		
</div>
@endif