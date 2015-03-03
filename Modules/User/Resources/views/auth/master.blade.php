<!DOCTYPE html>
<html lang='en' class="lockscreen">
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>@yield('title') | Art4Webs admin</title>

        <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        {{ HTML::style('admin/css/AdminLTE.css') }}
    </head>
    <body>
        @yield('content')
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>