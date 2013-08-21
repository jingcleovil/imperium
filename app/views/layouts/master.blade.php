<?php if(!isset($title)) $title= Config::get('ragnarok.siteName')?>
<!DOCTYPE html>
<html>
    <head>
      	<title>{{ $title }}</title>
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        {{ stylesheet('bootstrap.min.css') }}
        {{ stylesheet('default.css') }}

        @section('css')
        
        @show

        {{ script('yepnope.1.5.4-min.js') }}

    </head>
    <body>
        
        <div class="row row-main">
            
            <div class="col-xs-2 col-md-2 col-sidebar">
                
                @include('main.logo')

                @include('main.nav')

            </div>

            <div class="col-xs-10 col-md-10 col-main">
                
               @yield('content')

            </div>
        </div>



        <script type="text/javascript">

            var root, module, unsortable_cols;

            root = "{{ url() }}";
            module = "{{ isset($module) ? $module : '' }}";

            @section('var')

            @show

            yepnope({
                load: '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',
                callback: function(url, result, key) {

                    if(window.jQuery) {
                       @section('js')

                       @show
                    }
                
                }
            });
        </script>

    </body>
</html>