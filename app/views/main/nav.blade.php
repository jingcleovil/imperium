<ul class="nav navigation">
@foreach (Config::get('ragnarok.MenuItems') as $menuKey=>$menuVal)

    <li><span class="head">{{ $menuKey }}</span></li>

    @foreach($menuVal as $key=>$val)
        <li class="{{ Request::is($val['module']) ? 'active' : '' }}">
            <?php 
                $url = url($val['module']);

                if(isset($val['action']))
                    $url .= "/".$val['action'];
            ?>

            <a href="{{ $url }}">
                
                <?php if(isset($val['icon'])){?> 
                    <span class="glyphicon white glyphicon-{{ $val['icon'] }}"></span>
                <? } ?>

                {{ $key }}

            </a>
        </li>
    @endforeach

@endforeach


</ul>