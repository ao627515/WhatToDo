@extends('layouts.guest')

@section('content')
    <h1>Inscription</h1>
    <div class="todo-card login-card">
        <form action="{{ route('signup') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmer le Mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
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
