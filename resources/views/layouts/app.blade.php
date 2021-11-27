<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
     @yield('title',config('app.name', 'خدمات'))
     </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>


    @yield('style')


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app"  >
        @yield('navbar',View::make('layouts.components.navbar'))
        <main class="py-4 app-laravel bg-white" onclick="hide('app-notification-page');" >
            @yield('content')

        </main>
    </div>
    @guest
    @else
        @include('components.notification.index')
    @endguest
</body>
@yield('script')
<script type="text/javascript">
    function show(object){
        if (document.getElementById(object.target).classList.contains('d-none')) {
            document.getElementById(object.target).classList.remove('d-none');
        }else{
            document.getElementById(object.target).classList.add('d-none');
        }
    }
    function hide(id){

        if (!document.getElementById(id).classList.contains('d-none')) {
            document.getElementById(id).classList.add('d-none');
        }
    }
    function sendRequestReadChat(service_id){
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
            jQuery.ajax({
            url:"/messages-read/"+service_id,
            type: 'PUT',
            success: function(result){
                console.log(result);
            }});
    }
    function sendRequestReadChat_(service_id,user_id){
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
            jQuery.ajax({
            url:"/messages-read/"+service_id+"/"+user_id,
            type: 'PUT',
            success: function(result){
                console.log(result);
            }});
    }
    function sendRequestReadNotfications(count){
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
            jQuery.ajax({
            url:"/notification-read/"+count,
            type: 'PUT',
            success: function(result){
                console.log(result);
            }});
    }
</script>
</html>

