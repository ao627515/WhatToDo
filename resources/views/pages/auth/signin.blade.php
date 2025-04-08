@extends('layouts.guest')

@section('content')
    <div class="todo-card login-card">
        <h1>Connexion</h1>
        <form action="{{ route('signin') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary" id="signinBtn">Se Connecter</button>
                <a href="{{ route('signup') }}">
                    <button type="button" class="btn-secondary" style="width: 100%" id="signupBtn">S'inscrire</button>
                </a>
            </div>
        </form>
    </div>
@endsection
