<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/vendors.js') }}" defer></script>
    <script src="{{ asset('js/js.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
</head>

<style>
    table,
    th,
    td,
    tr {
        border: 1px solid;
        width: 500px;
        height: 50px;
    }

</style>


<body>

    <div id="app">

        <main class="py-4">
            <h1>Chauffeur</h1>
            <ul class="menu">
                <li><a class="nav-link" href="{{ route('echeance') }}"> Inserer les echeances</a></li>
                <li><a class="nav-link" href="{{ route('listEcheance') }}"> Listes des echeances</a></li>
                <li><a class="nav-link" href="{{ route('distance') }}"> Distance parcourue </a></li>
                <li><a class="nav-link" href="{{ route('deconnexion') }}"> Deconnexion </a></li>
            </ul>
        </main>
    </div>

    @yield('content')


</body>

</html>
