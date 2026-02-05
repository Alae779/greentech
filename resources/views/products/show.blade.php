@include('partials.header')

@section('title', 'Détail Produit')

<div style="max-width: 800px; margin: 0 auto;">
    <a href="/" style="color: #27ae60; text-decoration: none; margin-bottom: 20px; display: inline-block;">← Retour au catalogue</a>
    
    <div style="background: white; border-radius: 12px; padding: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <img src="https://via.placeholder.com/600x400/2ecc71/ffffff?text=Produit" style="width: 100%; border-radius: 8px; margin-bottom: 30px;" alt="Produit">
        
        <h1 style="font-size: 32px; color: #2c3e50; margin-bottom: 10px;">{{ $product->name }}</h1>
        
        <span class="product-category" style="margin-bottom: 20px; display: inline-block;">{{$product->category->title}}</span>
        
        <p style="font-size: 28px; color: #27ae60; font-weight: bold; margin: 20px 0;">{{ $product->prix }}</p>
        
        <p style="font-size: 16px; color: #555; line-height: 1.6; margin-bottom: 20px;">
            {{ $product->description }}
        </p>
    </div>
</div>
 
@include('partials.footer')