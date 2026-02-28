@include('partials.header')
@section('title', 'Users Management')

<h1 style="font-size: 32px; color: #2c3e50; margin-bottom: 30px;">👥 Gestion des Utilisateurs</h1>



<!-- Users Table -->
<div class="users-container">
    <table class="users-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="action-buttons">
                    <a href="{{route('affect_role',$user->id)}}" class="btn btn-small">Affecter un role</a>
                    <a href="{{route('edit_user',$user->id)}}" class="btn btn-small btn-secondary">Modifier</a>
                    <form action="{{route('delete_user',$user->id)}}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-small btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?');">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('partials.footer')