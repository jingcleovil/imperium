<?php if(!isset($title)) $title= "Home Page"?>
<!DOCTYPE html>
<html>
    <head>
      	<title>{{ $title }}</title>
      	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{ stylesheet() }}

        {{ script('vendor/yepnope.js') }}

    </head>
    <body>

        <div class="wrapper">
    	
            <div class="sidebar">
                @include('widget.logo')
                @section('sidebar')
                @show
            </div>

            <div class="content">
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
                        yepnope('{{asset('js/app.js')}}');
                    }
                
                }
            });
        </script>

    </body>
</html>