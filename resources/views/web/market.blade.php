@extends('web.layout')

@section('title', 'Market - Village Zone')

@section('content')
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
        <div class="px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">
                    <i class="fas fa-store mr-3"></i>
                    Agricultural Market
                </h1>
                <p class="text-xl text-green-100">
                    Discover quality agricultural products from trusted suppliers
                </p>
            </div>
        </div>
    </div>

    <!-- Results Summary -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            Products
        </h2>
        <div class="text-gray-600">
            Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} results
        </div>
    </div>


    <!-- Products Grid -->
    @if ($products->count() > 0)
        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            @foreach ($products as $product)
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

                        <span class="block text-lg font-bold text-green-600 mb-3">
                            Rs {{ number_format($product->price, 2) }}
                        </span>

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
                                <button disabled class="w-full bg-gray-400 text-white py-1.5 rounded-md">
                                    Out of Stock
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                                class="block w-full bg-gray-600 text-white text-center py-1.5 rounded-md hover:bg-gray-700 transition">
                                Login to Buy
                            </a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $products->links('pagination::tailwind') }}
        </div>
    @else
        <div class="bg-gray-100 rounded-lg p-12 text-center">
            <i class="fas fa-search text-4xl text-gray-400 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No Products Found</h3>
        </div>
    @endif
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
