<html>
    <head>
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
@if(sizeof($errors)>0)
<div class="error">
    @foreach(json_decode($errors) as $key=>$val)
        {{$errors->first($key)}}<br>
    @endforeach
</div>
@elseif(Session::get('message'))
    <div class="message">
        {{Session::get('message')}}
    </div>
@endif


        @yield('content')

    </body>
</html>