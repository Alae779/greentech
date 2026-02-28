@include('partials.header')

<div style="min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div class="auth-container">
        <div class="auth-header">
            <h1>📝 Inscription</h1>
            <p>Rejoignez la communauté GreenTech</p>
        </div>

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-input" required minlength="6">
            </div>

            <!-- <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
            </div> -->

            <button type="submit" class="btn" style="width: 100%;">S'inscrire</button>
        </form>

        <div class="auth-footer">
            <p>Déjà un compte ? <a href="/login">Se connecter</a></p>
        </div>
    </div>
</div>

@include('partials.footer')