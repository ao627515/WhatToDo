<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Todo List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @yield('styles')
</head>

<body>
    <div class="container">
        <header>
            <h3>Ma Todo List</h3>
            <button type="button" data-route="{{ route('signout') }}"
                class="btn-primary signoutBtn">Deconnexion</button>
        </header>
        <nav class="header-nav navbar">
            <ul>
                <li @class(['active' => request()->routeIs('todos.*')])>
                    <a href="{{ route('todos.index') }}">
                        Tache
                    </a>
                </li>
                <li @class(['active' => request()->routeIs('categories.*')])>
                    <a href="{{ route('categories.index') }}">
                        Categories
                    </a>
                </li>
                <li @class(['active' => request()->routeIs('users.*')])>
                    <a href="">
                        Personnes
                    </a>
                </li>
            </ul>
        </nav>
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
