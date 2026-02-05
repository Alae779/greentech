@include('partials.header')

@section('title', 'Catalogue')

<h1 style="font-size: 32px; color: #2c3e50; margin-bottom: 30px;">🌿 Notre Catalogue</h1>

<!-- Barre de recherche -->
<form action="/products/search" method="GET" class="search-bar">
    <input type="text" name="query" class="search-input" placeholder="Rechercher un produit...">
    <button type="submit" class="btn">Search</button>
    @auth
    @if(auth()->user()->role === 'admin')
    <a href="/admin/products/create" class="btn">Ajouter un Produit</a>
    @endif
    @endauth
</form>

<!-- Filtres par catégorie-->
<div class="category-filter">
    <a href="{{url('/')}}" class="category-btn {{ request()->is('/') && !request('category') ? 'active' : '' }}">Tous</a>
    <a href="{{url('/?category=1')}}" class="category-btn {{ request('category') == 1 ? 'active' : '' }}">🌱 Plantes</a>
    <a href="{{url('/?category=2')}}" class="category-btn {{ request('category') == 2 ? 'active' : '' }}">🌾 Graines</a>
    <a href="{{url('/?category=3')}}" class="category-btn {{ request('category') == 3 ? 'active' : '' }}">🔧 Outils</a>
</div>

<!-- Grille de produits -->
<div class="products-grid">
    <!-- Produit 1 (exemple statique pour l'instant) -->
     @foreach($products as $product)
    <div class="product-card">
        <div class="product-info">
            <h3 class="product-name">{{ $product->name }}</h3>
            <p class="product-price">{{ $product->prix }} MAD</p>
            <span class="product-category">{{$product->category->title}}</span>
            <br><br>
            <a href="/products/show/{{ $product->id }}" class="btn">Voir détails</a>
            @auth
            <form action="/favoris/toggle/{{ $product->id }}" method="post">
            @csrf
            <button type="submit" class="favorite-btn">
               @if(auth()->user()->isFavoris($product->id))
               <i class="fa-solid fa-heart text-red-500"></i>
               @else
               <i class="fa-regular fa-heart"></i>
               @endif
            </button>
            </form>
            @if(auth()->user()->role === 'admin')
            <a href="/products/edit/{{ $product->id }}" class="btn">Modifier</a>
            <a href="/products/delete/{{ $product->id }}" class="btn" onclick="return confirm('Are you sure you want to delete this product?');">Supprimer</a>
            @endif
            @endauth
        </div>
    </div>
    @endforeach

</div>


@include('partials.footer')