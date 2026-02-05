@include('partials.header')

@section('title', 'Détail Produit')

<div style="max-width: 800px; margin: 0 auto;">
    <a href="/" style="color: #27ae60; text-decoration: none; margin-bottom: 20px; display: inline-block;">← Retour au catalogue</a>
    @foreach($favoris as $fav)
    <div class="product-card">
        <div class="product-info">
            <h3 class="product-name">{{ $fav->name }}</h3>
            <p class="product-price">{{ $fav->prix }} MAD</p>
            <span class="product-category">{{$fav->category->title}}</span>
            <br><br>
            <form action="/favoris/toggle/{{ $fav->id }}" method="post">
            @csrf
            <button type="submit" class="favorite-btn">
               @if(auth()->user()->isFavoris($fav->id))
               <i class="fa-solid fa-heart text-red-500"></i>
               @else
               <i class="fa-regular fa-heart"></i>
               @endif
            </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
 
@include('partials.footer')