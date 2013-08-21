<?php if(!isset($title)) $title= Config::get('ragnarok.siteName')?>
<!DOCTYPE html>
<html>
    <head>
      	<title>{{ $title }}</title>
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        {{ stylesheet('bootstrap.min.css') }}
        {{ stylesheet('default.css') }}

        {{ script('vendor/yepnope.js') }}

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

            yepnope({
                load: '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js',
                callback: function(url, result, key) {

                    if(!window.jQuery) {
                        //console.log('jquery error')
                    }
                    else
                    {
                        yepnope('{{asset('js/script.js')}}?' + Math.random() );
                    }
                
                }
            });
        </script>

    </body>
</html>