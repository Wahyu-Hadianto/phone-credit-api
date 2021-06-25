<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/alert.js') }}"></script>
    @stack('child-css')
    <title>{{ env('APP_NAME')}}</title>
</head>
<body>
    @include('admin.layouts.navbar')
    <div id="app">
        <div class="title">
            <h2 class="text-center">@yield('title')</h2>
            <hr>
        </div>
        <div class="p-4 table-responsive">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('bootstrap/app.js')}}"></script>
    <script src="{{ asset('js/sweet.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    @stack('child-script')
</body>
</html>