<ul class="navigation">

    @foreach (Config::get('ragnarok.MenuItems') as $menuKey=>$menuVal)
        
        <li>
        	<?php 
        		$active = Request::is( $menuVal['module']."*" ) ? 'active' : '';
                $module = Config::get('ragnarok.Modules');
                $show   = true;

                $url    = url($menuVal['module']);

                if(isset($module[$menuVal['module']]) && isset($menuVal['action']))
                {
                    $action = $menuVal['action'];
                    $mod = $module[$menuVal['module']];

                    $url .= "/".$action;

                    if(isset($mod[$action]))
                    {
                        $index = $mod[$action];

                         if(in_array($index,array("ADMIN","AUTH")))
                        {
                            $show = false;

                            if(Auth::check())
                            {
                                $show = true;
                            } 
                        }
                        else if(in_array($index,array("UNAUTH")))
                        {
                            $show = false;
                        }

                    }
                }
                else
                {

                    if(isset($module[$menuVal['module']]))
                    {
                        $mod = $module[$menuVal['module']];
                        $index = $mod['index'];

                        if(in_array($index,array("ADMIN")))
                        {
                            $show = false;

                             if(Auth::check())
                                $show = true;
                        }
                    }
                }

                

        	?>
            
            @if($show)
            
            <a href="{{ $url }}" class="{{ $active }} ">
                <div><span class="glyphicon glyphicon-{{$menuVal['icon']}}"></span></div>
                {{ $menuKey }}
            </a>
            
            @endif

        </li>

    @endforeach

      
</ul>