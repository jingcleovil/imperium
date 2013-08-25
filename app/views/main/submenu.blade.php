<?php 
	$SubMenus 	= Config::get('ragnarok.SubMenus');
	$Path 		= Request::path();
	$IsShow 	= false;
	$SubMenu 	= null;

	if(!isset($id)) $id = 0;

	if(!isset($module)) $module = '';

	if( isset($SubMenus[$module]) )
	{
		$SubMenu = $SubMenus[$module];
	}

	$exPath = explode('/',$Path);

	if(isset($exPath[1]) && is_numeric($exPath[1]))
	{
		$IsShow = true;
	}
?>
@if($SubMenu)

	<div class="col-md-12">
		<ol class="breadcrumb">
			@foreach($SubMenu as $key=>$menu)
		
				<?php 
					$Url = $menu['module'];

					if($menu['action']) 
						$Url = $menu['module'].'/'.$menu['action'];
				?>
				
				@if($menu['action'] !== "modify")

					<li class="{{ Request::is($Url) ? 'active' : '' }}">
						@if($Url === $Path)
							{{$key}}
						@else
							<a href="{{url($Url)}}">{{$key}}</a>
						@endif
					</li>

				@elseif($IsShow)

					<li class="{{ Request::is($Url) ? 'active' : '' }}">
						<a href="{{ url($menu['module']).'/'.$id.'/edit' }}">{{$key}}</a>
					</li>

				@endif

			@endforeach

	
		</ol>		
	</div>
@endif