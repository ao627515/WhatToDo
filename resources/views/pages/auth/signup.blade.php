@extends('layouts.guest')

@section('content')
    <h1>Inscription</h1>
    <div class="todo-card login-card">
        <form action="{{ route('signin') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirmer le Mot de passe</label>
                <input type="password-confirm" id="password-confirm" name="password-confirm" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary" id="signinBtn">S'inscrire</button>
                <a href="{{ route('signin') }}">
                    <button type="button" class="btn-secondary" style="width: 100%" id="signupBtn">Se Connecter</button>
                </a>
            </div>
        </form>
    </div>
@endsection
