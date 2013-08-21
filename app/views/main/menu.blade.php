<ul class="navigation">

    @foreach (Config::get('ragnarok.MenuItems') as $menuKey=>$menuVal)
        
        <li>
            <a href="{{ url($menuVal['module']) }}" class="{{ Request::is( $menuVal['module'] ) ? 'active' : '' }}">
                <div><span class="glyphicon glyphicon-{{$menuVal['icon']}}"></span></div>
                {{ $menuKey }}
            </a>
        </li>

    @endforeach

      
</ul>