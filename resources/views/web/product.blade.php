@extends('web.layout')

@section('title', $product->name . ' - Village Zone')

@section('content')
<!-- Simple Breadcrumb -->
<div class="mb-4">
    <a href="{{ route('home') }}">Home</a> > 
    <a href="{{ route('market') }}">Market</a> > 
    @if($product->category)
        <a href="{{ route('market', ['category' => $product->category]) }}">{{ ucfirst($product->category) }}</a> > 
    @endif
    {{ $product->name }}
</div>

<!-- Product Details -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Product Image -->
    <div>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-64 object-cover border">
        @else
            <div class="w-full h-64 bg-gray-200 flex items-center justify-center border">
                No Image Available
            </div>
        @endif
    </div>
    
    <!-- Product Information -->
    <div>
        <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
        
        @if($product->category)
            <p class="text-gray-600 mb-2">Category: {{ ucfirst($product->category) }}</p>
        @endif
        
        <!-- Stock Status -->
        <div class="mb-4">
            @if($product->stock > 0)
                <p class="text-green-600">In Stock: {{ $product->stock }} available</p>
            @else
                <p class="text-red-600">Out of Stock</p>
            @endif
        </div>
        
        <!-- Price -->
        <div class="mb-6">
            <p class="text-2xl font-bold text-green-600">Rs {{ number_format($product->price, 2) }}</p>
        </div>
        
        <!-- Add to Cart -->
        @auth
            @if($product->stock > 0)
                <form action="{{-- route('cart.add') --}}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <div class="mb-3">
                        <label for="quantity">Quantity:</label>
                        <input type="number" 
                               id="quantity" 
                               name="quantity" 
                               value="1" 
                               min="1" 
                               max="{{ $product->stock }}"
                               class="w-20 ml-2 p-1 border">
                        <span class="ml-2 text-sm text-gray-600">(Max: {{ $product->stock }})</span>
                    </div>
                    
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 mr-2">
                        Add to Cart
                    </button>
                    <button type="button" class="bg-gray-600 text-white px-4 py-2">
                        Add to Wishlist
                    </button>
                </form>
            @else
                <div class="mb-4">
                    <p class="text-red-600">This product is currently out of stock.</p>
                </div>
            @endif
        @else
            <div class="mb-4">
                <p class="mb-2">Please log in to purchase this product.</p>
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 mr-2">Login</a>
                <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2">Register</a>
            </div>
        @endauth
    </div>
</div>

<!-- Product Description -->
<div class="mb-8">
    <h2 class="text-xl font-bold mb-3">Description</h2>
    <p class="text-gray-700">
        {{ $product->description ?? 'No description available for this product.' }}
    </p>
</div>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
    <div>
        <h2 class="text-xl font-bold mb-4">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($relatedProducts as $relatedProduct)
                <div class="border p-4">
                    @if($relatedProduct->image)
                        <img src="{{ asset('storage/' . $relatedProduct->image) }}" 
                             alt="{{ $relatedProduct->name }}" 
                             class="w-full h-32 object-cover mb-2">
                    @else
                        <div class="w-full h-32 bg-gray-200 flex items-center justify-center mb-2">
                            No Image
                        </div>
                    @endif
                    
                    <h3 class="font-bold mb-1">{{ $relatedProduct->name }}</h3>
                    <p class="text-green-600 font-bold mb-2">Rs {{ number_format($relatedProduct->price, 2) }}</p>
                    <p class="text-sm text-gray-600 mb-2">Stock: {{ $relatedProduct->stock }}</p>
                    
                    <a href="{{ route('product.show', $relatedProduct->id) }}" 
                       class="bg-green-600 text-white px-3 py-1 text-sm">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif
@endsection