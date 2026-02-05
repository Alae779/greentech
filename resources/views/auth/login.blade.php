@include('partials.header')

<div style="min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div class="auth-container">
        <div class="auth-header">
            <h1>🔐 Connexion</h1>
            <p>Accédez à votre espace GreenTech</p>
        </div>

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login/login" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-input" required>
                @error('email')
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-input" required>
            </div>

            <button type="submit" class="btn" style="width: 100%;">Se connecter</button>
        </form>

        <div class="auth-footer">
            <p>Pas encore de compte ? <a href="/register">Créer un compte</a></p>
        </div>
    </div>
</div>

@include('partials.footer')