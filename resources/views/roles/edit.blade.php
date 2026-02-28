@include('partials.header')

<div style="max-width: 600px; margin: 0 auto;">
    
    <h1 style="font-size: 32px; color: #2c3e50; margin-bottom: 30px;">Modifier un role</h1>

    <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <form action="{{route('update_role',$role->id)}}" method="POST">
            @csrf

            <!-- Nom du produit -->
            <div class="form-group">
                <label for="name">Nouveau nom du role <span style="color: red;">*</span></label>
                <input value="{{$role->name}}" type="text" id="name" name="name" class="form-input" required>
            </div>


    <!-- Permissions -->
            <div class="form-group">
                <label>Permissions <span style="color: red;">*</span></label>

                <div style="margin-top: 10px;">
                    @foreach ($permissions as $permission)
                        <div style="margin-bottom: 8px;">
                            <label style="display: flex; align-items: center; gap: 8px;">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                >
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>


            

            <!-- Boutons -->
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <a href="{{route('home')}}" class="btn-secondary">Annuler</a>
                <button type="submit" class="btn">💾 Enregistrer</button>
            </div>
        </form>
    </div>
</div>

@include('partials.footer')