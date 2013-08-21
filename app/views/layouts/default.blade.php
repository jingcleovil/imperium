<?php if(!isset($title)) $title= Config::get('ragnarok.siteName')?>
<!DOCTYPE html>
<html>
    <head>
      	<title>{{ $title }}</title>
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        {{ stylesheet('bootstrap.min.css') }}
        {{ stylesheet('global.css') }}

        @section('css')
        
        @show

        {{ script('yepnope.1.5.4-min.js') }}

    </head>
    <body>
        
        
        <div class="main-wrapper">
    
            <div class="left-panel col-lg-2 col-md-3 col-sm-3 col-xs-3 hidden-xs navigation sidebar-offcanvas" role="navigation">
                

                @include('main.logo')
                @include('main.profile')
                @include('main.menu')

            </div>

            <!--left-panel -->
            <div class="right-panel col-lg-10 col-md-9  col-sm-9 col-xs-12 padding-none">
                <div>
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

                    if(window.jQuery) {
                       @section('js')

                       @show
                    }
                
                }
            });
        </script>

    </body>
</html>