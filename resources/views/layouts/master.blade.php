<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Кратковременная аренда квартир в городе Бишкек и Иссык-Куль. Отзывы об отелях Бишкеке и Иссык-куля">
    <meta name="keywords" content="гостиницы, апартаменты, квартиры, аренда, sutki.kg, снять квартиру, Отзывы об отелях, Бишкек, Иссык-Куль, в Бишкеке, Кыргызстан, в Иссык-Куле, Киргизия">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}"  media="screen,projection"/>


    @yield('head')
</head>
<body>
<div class="container">

@yield('content')

</div>
@yield('footer')
<!-- Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('materialize/js/materialize.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('script')
</body>
</html>
