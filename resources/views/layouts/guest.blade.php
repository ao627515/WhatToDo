<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel Todo List' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>
    <div class="container">
        <header>
            <h1>Connecte toi et voit tes taches</h1>
        </header>
        <div class="todo-card guest-card ">
            @yield('content')
        </div>
    </div>
</body>

</html>
