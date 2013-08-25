<?php 
	$SubMenus = Config::get('ragnarok.SubMenus');

	$SubMenu = null;

	if(!isset($module)) $module = '';

	if( isset($SubMenus[$module]) )
	{
		$SubMenu = $SubMenus[$module];


	}
?>
@if($SubMenu)

	<div class="col-md-12">
		<ol class="breadcrumb">
			@foreach($SubMenu as $key=>$menu)
		
				<?php 
					$url = $menu['module'];

					if($menu['action']) 
						$url = $menu['module'].'/'.$menu['action'];

				?>
		
				<li class="{{ Request::is($url) ? 'active' : '' }}">
					@if($url === Request::path())
						{{$key}}
					@else
						<a href="{{url($url)}}">{{$key}}</a>
					@endif
				</li>

			@endforeach
		</ol>		
	</div>
@endif