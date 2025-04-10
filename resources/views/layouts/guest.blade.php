<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel Todo List' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body class="guest">
    <div class="container">
        <div class="card guest-card ">
            @yield('content')
        </div>
    </div>
</body>

</html>
