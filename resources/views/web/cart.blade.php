@extends('web.layout')

@section('title', 'Shopping Cart - AgriConnect')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
    <div class="px-8 py-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">
                <i class="fas fa-shopping-cart mr-3"></i>
                Shopping Cart
            </h1>
            <p class="text-xl text-green-100">
                Review your selected items before checkout
            </p>
        </div>
    </div>
</div>

@if(!empty($cart) && count($cart) > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Cart Items ({{ count($cart) }})</h2>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @foreach($cart as $productId => $item)
                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <!-- Product Image -->
                                <div class="flex-shrink-0">
                                    @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" 
                                             alt="{{ $item['name'] }}" 
                                             class="w-20 h-20 object-cover rounded-lg">
                                    @else
                                        <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Product Details -->
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        {{ $item['name'] }}
                                    </h3>
                                    <p class="text-green-600 font-bold text-xl">
                                        Rs {{ number_format($item['price'], 2) }}
                                    </p>
                                </div>
                                
                                <!-- Quantity Controls -->
                                <div class="flex items-center space-x-3">
                                    <form action="{{ route('cart.update', $productId) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="button" 
                                                onclick="decreaseQuantity('quantity-{{ $productId }}')"
                                                class="bg-gray-200 text-gray-700 px-2 py-1 rounded hover:bg-gray-300">
                                            <i class="fas fa-minus text-sm"></i>
                                        </button>
                                        <input type="number" 
                                               id="quantity-{{ $productId }}"
                                               name="quantity" 
                                               value="{{ $item['quantity'] }}" 
                                               min="1" 
                                               max="100"
                                               class="w-16 text-center border border-gray-300 rounded py-1 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                        <button type="button" 
                                                onclick="increaseQuantity('quantity-{{ $productId }}')"
                                                class="bg-gray-200 text-gray-700 px-2 py-1 rounded hover:bg-gray-300">
                                            <i class="fas fa-plus text-sm"></i>
                                        </button>
                                        <button type="submit" 
                                                class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 transition-colors">
                                            Update
                                        </button>
                                    </form>
                                </div>
                                
                                <!-- Item Total -->
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-800">
                                        Rs {{ number_format($item['price'] * $item['quantity'], 2) }}
                                    </p>
                                    <form action="{{ route('cart.remove', $productId) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-700 text-sm"
                                                onclick="return confirm('Are you sure you want to remove this item?')">
                                            <i class="fas fa-trash mr-1"></i>
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Continue Shopping -->
            <div class="mt-6 text-center">
                <a href="{{ route('market') }}" 
                   class="inline-flex items-center text-green-600 hover:text-green-800 font-semibold">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Continue Shopping
                </a>
            </div>
        </div>
        
        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-lg sticky top-6">
                <div class="px-6 py-4 bg-gray-50 border-b rounded-t-lg">
                    <h2 class="text-xl font-semibold text-gray-800">Order Summary</h2>
                </div>
                
                <div class="p-6 space-y-4">
                    <!-- Subtotal -->
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal ({{ count($cart) }} items):</span>
                        <span class="font-semibold">Rs {{ number_format($total, 2) }}</span>
                    </div>
                    
                    <!-- Shipping -->
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping:</span>
                        <span class="font-semibold">
                            @if($total >= 50)
                                <span class="text-green-600">FREE</span>
                            @else
                                $5.00
                            @endif
                        </span>
                    </div>
                    
                    <!-- Tax -->
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax:</span>
                        <span class="font-semibold">Rs {{ number_format($total * 0.08, 2) }}</span>
                    </div>
                    
                    <hr class="my-4">
                    
                    <!-- Total -->
                    <div class="flex justify-between text-xl font-bold">
                        <span>Total:</span>
                        <span class="text-green-600">
                            Rs {{ number_format($total + ($total >= 50 ? 0 : 5) + ($total * 0.08), 2) }}
                        </span>
                    </div>
                    
                    <!-- Free Shipping Notice -->
                    @if($total < 50)
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mt-4">
                            <p class="text-sm text-yellow-700">
                                <i class="fas fa-info-circle mr-1"></i>
                                Add Rs {{ number_format(50 - $total, 2) }} more for free shipping!
                            </p>
                        </div>
                    @endif
                    
                    <!-- Checkout Button -->
                    <div class="mt-6">
                        @auth
                            <a href="{{ route('checkout') }}" 
                               class="w-full bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors block text-center">
                                <i class="fas fa-credit-card mr-2"></i>
                                Proceed to Checkout
                            </a>
                        @else
                            <div class="space-y-3">
                                <p class="text-sm text-gray-600 text-center">Please login to proceed</p>
                                <a href="{{ route('login') }}" 
                                   class="w-full bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors block text-center">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    Login to Checkout
                                </a>
                            </div>
                        @endauth
                    </div>
                    
                    <!-- Security Notice -->
                    <div class="mt-4 text-center">
                        <p class="text-xs text-gray-500">
                            <i class="fas fa-lock mr-1"></i>
                            Secure checkout guaranteed
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Empty Cart -->
    <div class="text-center py-16">
        <div class="bg-white rounded-lg shadow-lg p-12 max-w-md mx-auto">
            <i class="fas fa-shopping-cart text-gray-400 text-6xl mb-6"></i>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Your cart is empty</h2>
            <p class="text-gray-600 mb-8">Looks like you haven't added any items to your cart yet.</p>
            <a href="{{ route('market') }}" 
               class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors inline-flex items-center">
                <i class="fas fa-shopping-bag mr-2"></i>
                Start Shopping
            </a>
        </div>
    </div>
@endif

<script>
function increaseQuantity(inputId) {
    const input = document.getElementById(inputId);
    const currentValue = parseInt(input.value) || 1;
    const maxValue = parseInt(input.getAttribute('max')) || 100;
    
    if (currentValue < maxValue) {
        input.value = currentValue + 1;
    }
}

function decreaseQuantity(inputId) {
    const input = document.getElementById(inputId);
    const currentValue = parseInt(input.value) || 1;
    const minValue = parseInt(input.getAttribute('min')) || 1;
    
    if (currentValue > minValue) {
        input.value = currentValue - 1;
    }
}
</script>
@endsection