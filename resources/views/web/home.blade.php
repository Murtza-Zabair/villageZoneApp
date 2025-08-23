@extends('web.layout')


@section('title', 'Home - Village Zone')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-12">
        <div class="px-8 py-16 md:py-24">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Welcome to <span class="text-green-200">Village Zone</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-green-100">
                    Your trusted partner in agricultural excellence. Connecting farmers with quality products, expert
                    knowledge, and healthcare solutions.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('market') }}"
                        class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-50 transition-colors inline-flex items-center justify-center">
                        <i class="fas fa-store mr-2"></i>
                        Explore Market
                    </a>
                    <a href="{{ route('farming.tips') }}"
                        class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors inline-flex items-center justify-center">
                        <i class="fas fa-lightbulb mr-2"></i>
                        Get Farming Tips
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="mb-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Why Choose Village Zone?
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                We provide comprehensive solutions for modern farming challenges
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow border-t-4 border-green-500">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-store text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Quality Products</h3>
                    <p class="text-gray-600">
                        Access to high-quality agricultural products, tools, and equipment from trusted suppliers.
                    </p>
                    <a href="{{ route('market') }}"
                        class="inline-block mt-4 text-green-600 hover:text-green-800 font-semibold">
                        Browse Products →
                    </a>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow border-t-4 border-green-500">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Expert Guidance</h3>
                    <p class="text-gray-600">
                        Get expert farming tips, techniques, and best practices to maximize your crop yield.
                    </p>
                    <a href="{{ route('farming.tips') }}"
                        class="inline-block mt-4 text-green-600 hover:text-green-800 font-semibold">
                        Learn More →
                    </a>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow border-t-4 border-green-500">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heartbeat text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Healthcare Support</h3>
                    <p class="text-gray-600">
                        Access healthcare information and support services tailored for farming communities.
                    </p>
                    <a href="{{ route('healthcare') }}"
                        class="inline-block mt-4 text-green-600 hover:text-green-800 font-semibold">
                        Learn More →
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Featured Products</h2>
            <a href="{{ route('market') }}" class="text-green-600 hover:underline">
                View All
            </a>
        </div>

        @if ($featuredProducts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($featuredProducts as $product)
                    <div class="bg-white border rounded-lg overflow-hidden hover:shadow-md transition">
                        <a href="{{ route('product.show', $product->id) }}">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-100 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-2xl"></i>
                                </div>
                            @endif
                        </a>

                        <div class="p-3">
                            <h3 class="font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 mb-2 line-clamp-2">
                                {{ Str::limit($product->description, 60) }}
                            </p>
                            <span class="text-lg font-bold text-green-600">
                                Rs {{ number_format($product->price, 2) }}
                            </span>

                            <div class="mt-3">
                                @auth
                                    @if ($product->stock > 0)
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit"
                                                class="w-full bg-green-600 text-white py-1.5 rounded-md hover:bg-green-700 transition">
                                                Add to Cart
                                            </button>
                                        </form>
                                    @else
                                        <button class="w-full bg-gray-400 text-white py-1.5 rounded-md cursor-not-allowed">
                                            Out of Stock
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}"
                                        class="block w-full bg-gray-600 text-white py-1.5 rounded-md hover:bg-gray-700 transition text-center">
                                        Login to Buy
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-50 rounded-lg p-10 text-center">
                <i class="fas fa-box-open text-3xl text-gray-400 mb-3"></i>
                <h3 class="text-lg font-semibold text-gray-600">No Featured Products</h3>
                <a href="{{ route('market') }}" class="mt-3 inline-block text-green-600 hover:underline">
                    Browse All Products
                </a>
            </div>
        @endif
    </div>


    <!-- Call to Action Section -->
    <div class="bg-green-50 rounded-lg p-8 md:p-12 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">
            Ready to Get Started?
        </h2>
        <p class="text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
            Join thousands of farmers who trust Village Zone for their agricultural needs.
            Get access to quality products, expert advice, and healthcare support.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @guest
                <a href="{{ route('register') }}"
                    class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                    Join Village Zone Today
                </a>
            @endguest
            <a href="{{ route('contact') }}"
                class="border-2 border-green-600 text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-600 hover:text-white transition-colors">
                Contact Us
            </a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
