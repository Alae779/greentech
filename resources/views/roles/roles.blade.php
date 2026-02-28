@include('partials.header')
@section('title', 'Roles Management')

<h1 style="font-size: 32px; color: #2c3e50; margin-bottom: 30px;">🔐 Gestion des Rôles</h1>
    <a href="{{ route('create_role') }}" class="btn">Ajouter un Role</a>

<!-- Roles Grid -->
<div class="roles-grid">
    @foreach($roles as $role)
    <div class="role-card">
        <div class="role-card-header">
            <h3 class="role-title">{{ $role->title }}</h3>
            <span class="role-badge role-{{ strtolower($role->title) }}">
                {{ $role->title }}
            </span>
        </div>

        <div class="role-card-body">
            <div class="role-info">
                <span class="info-label">Nom:</span>
                <span class="info-value">{{ $role->name }}</span>
            </div>

            <div class="role-info">
                <span class="info-label">Nombre d'utilisateurs:</span>
                <span class="info-value">{{ $role->users->count() }}</span>
            </div>

            @if($role->description)
            <div class="role-description">
                <p>{{ $role->description }}</p>
            </div>
            @endif
        </div>

        <div class="role-card-footer">
            <a href="/roles/show/{{ $role->id }}" class="btn btn-small">Voir détails</a>
            <a href="{{route('edit_role',$role->id)}}" class="btn btn-small btn-secondary">Modifier</a>
            <form action="{{route('delete_role',$role->id)}}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-small btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle?');">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@include('partials.footer')