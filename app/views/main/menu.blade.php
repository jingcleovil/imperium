<ul class="navigation">

    @foreach (Config::get('ragnarok.MenuItems') as $key=>$val)
        
        <li>
        
        	<?php 
        		$active = Request::is( $val['module']."*" ) ? 'active' : '';
                $module = Config::get('ragnarok.Modules');
                $show   = true;
                $action = isset($val['action']) ? $val['action'] : false;
                
                if(isset($module[$val['module']]) && $action !== false)
                {
                    if(isset($module[$val['module']][$action]))
                    {
                        if(isset($module[$val['module']]['logout']))
                        {
                            if(!Auth::check())
                                $show = false;
                        }

                        if($module[$val['module']][$action] === -1)
                        {
                            $show = false;
                                if(!Auth::check())
                                    $show = true;
                        }
        
                    }
                }
                else if(isset($module[$val['module']]))
                {   
                    if(isset($module[$val['module']]['index']))
                    {
                        $module_level = $module[$val['module']]['index'];

                        if($module_level > 0)
                        {
                            $show = false;
                            
                            if(Auth::check())
                            {
                                $group_id = Auth::user()->group_id;
                                $groups = AccountLevel::getGroupLevel($group_id);
                                
                                if($groups >= $module_level)
                                {
                                    $show = true;
                                }
                            }   
                        }
                    
                    }
                }

               // print_r($show);

                

                $url = url($val['module']);

                if($action !== false)
                    $url .= "/".$action;

        	?>
            
            @if($show)
            
            <a href="{{ $url }}" class="{{ $active }} ">
                <div><span class="glyphicon glyphicon-{{$val['icon']}}"></span></div>
                {{ $key }}
            </a>
            
            @endif

        </li>

    @endforeach

      
</ul>