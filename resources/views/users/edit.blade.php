@include('partials.header')

<div style="max-width: 600px; margin: 0 auto;">
    <h1 style="font-size: 32px; color: #2c3e50; margin-bottom: 30px;">Modifier un produit</h1>

    <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <form action="{{route('update_user',$users->id)}}" method="POST">
            @csrf

            <!-- Nom du produit -->
            <div class="form-group">
                <label for="name">Nouveau nom du produit <span style="color: red;">*</span></label>
                <input value="{{$users->name}}" type="text" id="name" name="name" class="form-input" required>
            </div>

            <!-- Prix -->
            <div class="form-group">
                <label for="prix">Nouveau email<span style="color: red;">*</span></label>
                <input value="{{$users->email}}" type="email" id="email" name="prix" step="0.01" class="form-input" required>
            </div>

            <!-- Catégorie -->
            
    
            <!-- Boutons -->
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <a href="{{ route('show_users') }}" class="btn-secondary">Annuler</a>
                <button type="submit" class="btn">💾 Enregistrer</button>
            </div>
        </form>
    </div>
</div>

@include('partials.footer')