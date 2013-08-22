<ul class="navigation">

    @foreach (Config::get('ragnarok.MenuItems') as $menuKey=>$menuVal)
        
        <li>
        	<?php 
        		$active = Request::is( $menuVal['module']."*" ) ? 'active' : '';
        	?>

            <a href="{{ url($menuVal['module']) }}" class="{{ $active }} ">
                <div><span class="glyphicon glyphicon-{{$menuVal['icon']}}"></span></div>
                {{ $menuKey }}
            </a>
        </li>

    @endforeach

      
</ul>