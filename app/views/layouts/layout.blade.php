<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> ETSB :: Employee's CRUD Application </title>
    {{ HTML::style('asset/css/bootstrap.min.css') }}

    {{-- Start Scripts --}}
    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
    {{ HTML::script('asset/js/jquery-2.1.4.min.js')}}
    {{ HTML::script('asset/js/bootstrap.min.js')}}
    {{-- End Scripts --}}

</head>

<body>
<div class="container">
    @yield('content')
</div>

</body>
</html>