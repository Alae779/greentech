@include('partials.header')
@section('title', 'Affecter un Rôle')

<div class="assign-role-container">
    <div class="assign-role-card">

        {{-- Header --}}
        <div class="assign-role-header">
            <div>
                <h1>🔐 Affecter un Rôle</h1>
                <p>Gérer le rôle de l'utilisateur</p>
            </div>
            <a href="/users" class="btn btn-secondary">← Retour</a>
        </div>

        <div class="user-banner">
            <div class="user-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="user-banner-info">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }}</p>
            </div>
        </div>

        <form action="{{route('assign_role',$user->id)}}" method="POST">
            @csrf

            <h3 class="section-title">Choisir un nouveau rôle</h3>

            <div class="roles-selection">
                @foreach($roles as $role)
                <label class="role-option {{ strtolower($user->role) === strtolower($role->title) ? 'currently-assigned' : '' }}">
                    <input
                        type="checkbox"
                        name="role"
                        value="{{ $role->id }}"
                        {{ $user->hasRole($role->name) ? 'checked' : '' }}
                    >
                    <div class="role-option-content">
                        <div class="role-option-top">
                            <div class="role-option-icon">
                                    👤
                            </div>
                            <div>
                                <span style="color: black;" class="role-option-name">{{ $role->name }}</span>
                            </div>
                        </div>
                        <p class="role-option-desc">
                        </p>
                    </div>
                    <div class="role-check-indicator">✓</div>
                </label>
                @endforeach
            </div>

            {{-- Submit --}}
            <div class="form-actions">
                <a href="/users" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn">💾 Enregistrer le rôle</button>
            </div>
        </form>

    </div>
</div>

@include('partials.footer')