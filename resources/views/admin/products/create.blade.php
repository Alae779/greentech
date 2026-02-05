@include('partials.header')

<div style="max-width: 600px; margin: 0 auto;">
    <h1 style="font-size: 32px; color: #2c3e50; margin-bottom: 30px;">➕ Ajouter un produit</h1>

    <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <form action="/admin/products/store" method="POST">
            @csrf

            <!-- Nom du produit -->
            <div class="form-group">
                <label for="name">Nom du produit <span style="color: red;">*</span></label>
                <input type="text" id="name" name="name" class="form-input" required>
            </div>

            <!-- Prix -->
            <div class="form-group">
                <label for="prix">Prix (MAD) <span style="color: red;">*</span></label>
                <input type="number" id="prix" name="prix" step="0.01" class="form-input" required>
            </div>

            <!-- Catégorie -->
            <div class="form-group">
                <label for="category_id">Catégorie <span style="color: red;">*</span></label>
                <select id="category_id" name="category_id" class="form-input" required>
                    <option value="">-- Sélectionnez une catégorie --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description du produit <span style="color: red;">*</span></label>
                <input type="text" id="description" name="description" class="form-input" required>
            </div>

            <!-- Boutons -->
            <div style="display: flex; gap: 15px; margin-top: 30px;">
                <a href="/" class="btn-secondary">Annuler</a>
                <button type="submit" class="btn">💾 Enregistrer</button>
            </div>
        </form>
    </div>
</div>

@include('partials.footer')