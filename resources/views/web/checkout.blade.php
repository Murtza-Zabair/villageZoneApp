@extends('web.layout')

@section('title', 'Checkout - AgriConnect')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
    <div class="px-8 py-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">
                <i class="fas fa-shopping-cart mr-3"></i>
                Checkout
            </h1>
            <p class="text-xl text-green-100">
                Complete your order - We'll contact you to confirm
            </p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Checkout Form -->
    <div class="lg:col-span-2">
        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Customer Information -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-user text-green-600 mr-3"></i>
                        Customer Information
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="customer_name" 
                               name="customer_name" 
                               value="{{ old('customer_name', auth()->user()->name ?? '') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Enter your full name">
                        @error('customer_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', auth()->user()->email ?? '') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Enter your email address">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Enter your phone number">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message (Optional)
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                  placeholder="Any special instructions or notes...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <button type="submit" 
                        class="flex-1 bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-check mr-2"></i>
                    Place Order
                </button>
                
                <a href="{{ route('cart') }}" 
                   class="flex-1 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Cart
                </a>
            </div>
        </form>
    </div>

    <!-- Order Summary -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden sticky top-4">
            <div class="bg-blue-50 px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-receipt text-blue-600 mr-3"></i>
                    Order Summary
                </h2>
            </div>
            <div class="p-6">
                <!-- Cart Items -->
                <div class="space-y-4 mb-6">
                    @forelse($cart as $item)
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                            <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" 
                                         alt="{{ $item['name'] }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-500"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-800 text-sm">{{ $item['name'] }}</h4>
                                <p class="text-xs text-gray-600">Qty: {{ $item['quantity'] }}</p>
                                <p class="text-sm font-bold text-green-600">Rs {{ number_format($item['price'], 2) }} each</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-gray-800">Rs {{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-shopping-cart text-gray-300 text-4xl mb-4"></i>
                            <p class="text-gray-500">Your cart is empty</p>
                        </div>
                    @endforelse
                </div>

                <!-- Order Total -->
                <div class="border-t pt-4">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-800">Total Amount:</span>
                        <span class="text-2xl font-bold text-green-600">Rs {{ number_format($total, 2) }}</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">
                        <i class="fas fa-info-circle mr-1"></i>
                        Payment will be handled offline
                    </p>
                </div>

                <!-- Info Notice -->
                <div class="mt-6 p-4 bg-yellow-50 rounded-lg">
                    <div class="flex items-start">
                        <i class="fas fa-phone text-yellow-600 mt-1 mr-2"></i>
                        <div>
                            <h4 class="text-sm font-medium text-yellow-800">What happens next?</h4>
                            <p class="text-xs text-yellow-700 mt-1">
                                We'll contact you within 24 hours to confirm your order and arrange payment & delivery.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection