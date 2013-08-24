<?php if(!isset($title)) $title= Config::get('ragnarok.siteName')?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      	
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
        <meta name="apple-mobile-web-app-capable" content="yes" />
            
        <title>{{ $title }}</title>

        {{ stylesheet('bootstrap.min.css') }}
        {{ stylesheet('global.css') }}
        {{ stylesheet('green-theme.css?v=1') }}

        @section('css')
        
        @show

        {{ script('yepnope.1.5.4-min.js') }}

    </head>
    <body>
        
        
        <div class="main-wrapper row row-offcanvas row-offcanvas-right">
    
            <div class="left-panel col-lg-2 col-md-3 col-sm-3 col-xs-3 navigation sidebar-offcanvas" role="navigation">
                
                @include('main.logo')
                @include('main.profile')
                @include('main.menu')

            </div>

            <!--left-panel -->
            <div class="right-panel col-lg-10 col-md-9  col-sm-9 col-xs-12 padding-none wrapper-min-height">
                <div>
                    <h1 class="visible-xs toggler">
                        <a href="" data-toggle="offcanvas"><span class="glyphicon glyphicon-align-justify"></span></a> {{ $title }}
                    </h1>
                    <h1 class="hidden-xs">
                        <?php if(!isset($icon)) $icon = "home"; ?>
                        <span class="glyphicon glyphicon-{{$icon}}"></span> {{ $title }}
                    </h1>
                    @yield('content')
                </div>
            </div>
          <!--right-panel -->
        </div>
        <!--main-wrapper -->

        @section('modal')

        @show

        <script type="text/javascript">

            var root, module, unsortable_cols, autoload;

            root = "{{ url() }}";
            module = "{{ isset($module) ? $module : '' }}";

            @section('var')

            @show

            yepnope({
                load: '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',
                callback: function(url, result, key) {

                    yepnope('{{ asset('js/bootstrap.min.js') }}');
                    yepnope('{{ asset('js/script.js') }}?v=5');

                    if(window.jQuery) {
                       @section('js')

                       @show
                    }

                    $('[data-toggle=offcanvas]').click(function(e) {
                        e.preventDefault();
                        $('.row-offcanvas').toggleClass('active');
                    });

                }
            });
        </script>

    </body>
</html>