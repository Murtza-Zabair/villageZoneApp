@extends('web.layout')

@section('title', 'My Orders - Village Zone')

@section('content')
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 text-white rounded-lg shadow-lg mb-8">
        <div class="px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">
                    <i class="fas fa-list mr-3"></i>
                    My Orders
                </h1>
                <p class="text-xl text-blue-100">
                    Track your orders and purchase history
                </p>
            </div>
        </div>
    </div>

    @if ($orders->count() > 0)
        <div class="space-y-6">
            @foreach ($orders as $order)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Order Header -->
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">
                                    Order #{{ $order->order_number }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    Placed on {{ $order->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            <div class="mt-3 md:mt-0 flex items-center space-x-4">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ $order->status_color === 'yellow' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status_color === 'blue' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $order->status_color === 'green' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status_color === 'red' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ $order->status_label }}
                                </span>
                                <span class="text-lg font-bold text-gray-800">
                                    Rs {{ number_format($order->total_amount, 2) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="p-6">
                        <h4 class="font-medium text-gray-800 mb-4">Order Items</h4>
                        <div class="space-y-3">
                            @foreach ($order->orderItems as $item)
                                <div
                                    class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                            @if ($item->product && $item->product->image)
                                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                                    alt="{{ $item->product_name }}"
                                                    class="w-full h-full object-cover rounded-lg">
                                            @else
                                                <i class="fas fa-image text-gray-400"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $item->product_name }}</p>
                                            <p class="text-sm text-gray-600">
                                                Quantity: {{ $item->quantity }} × Rs {{ number_format($item->price, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-gray-800">
                                            Rs {{ number_format($item->total, 2) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Order Details -->
                    @if ($order->message)
                        <div class="px-6 pb-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h5 class="font-medium text-gray-800 mb-2">Order Notes:</h5>
                                <p class="text-sm text-gray-600">{{ $order->message }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="bg-white rounded-lg shadow-lg p-12 max-w-md mx-auto">
                <i class="fas fa-shopping-bag text-gray-400 text-6xl mb-6"></i>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">No orders yet</h2>
                <p class="text-gray-600 mb-8">You haven't placed any orders. Start shopping to see your orders here!</p>
                <a href="{{ route('market') }}"
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors inline-flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Start Shopping
                </a>
            </div>
        </div>
    @endif
@endsection
