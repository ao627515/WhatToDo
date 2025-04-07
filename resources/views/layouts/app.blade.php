<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @yield('css')
    <title>ToDo App</title>
</head>

<body>
    <div class="app-container">
        <x-header />
        <main class="app-content">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('js')
</body>

</html>
