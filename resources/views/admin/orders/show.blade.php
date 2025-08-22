<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Order Details - {{ $order->order_number }}
            </h2>
            <a href="{{ route('admin.orders.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition duration-200">
                ← Back to Products
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Order Information</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                            <p><strong>Email:</strong> {{ $order->email }}</p>
                            <p><strong>Phone:</strong> {{ $order->phone }}</p>
                            <p><strong>Total Amount:</strong> Rs {{ number_format($order->total_amount, 2) }}</p>
                        </div>
                        <div>
                            <p><strong>Status:</strong>
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    @if ($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'confirmed') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
                            <p><strong>Items:</strong> {{ $order->orderItems->sum('quantity') }}</p>
                            <p><strong>Products:</strong> {{ $order->orderItems->count() }}</p>
                        </div>
                    </div>

                    @if ($order->message)
                        <div class="mt-6">
                            <h4 class="font-semibold mb-2">Customer Message:</h4>
                            <div class="bg-gray-50 p-4 rounded border-l-4 border-blue-500">
                                <p class="text-gray-700">"{{ $order->message }}"</p>
                            </div>
                        </div>
                    @endif

                    <div class="mt-6">
                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}" class="inline">
                            @csrf
                            @method('PATCH')

                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Update Status:
                            </label>

                            <div class="flex items-center gap-4"> {{-- ✅ more space --}}
                                <select name="status" id="status"
                                    class="w-48 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>
                                        Confirmed</option>
                                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>
                                        Delivered</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                </select>

                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                    Update Status
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Order Items</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Product</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if ($item->product && $item->product->image)
                                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                                        alt="{{ $item->product_name }}"
                                                        class="w-12 h-12 object-cover rounded mr-4">
                                                @endif
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $item->product_name }}</div>
                                                    @if ($item->product)
                                                        <div class="text-sm text-gray-500">
                                                            {{ $item->product->category }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Rs {{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Rs {{ number_format($item->total, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="bg-gray-50">
                                    <td colspan="3" class="px-6 py-4 text-right font-semibold text-gray-900">
                                        Total Amount:
                                    </td>
                                    <td class="px-6 py-4 font-bold text-lg text-gray-900">
                                        Rs {{ number_format($order->total_amount, 2) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if ($order->status === 'cancelled')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 border-2 border-red-200">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4 text-red-800">Danger Zone</h3>
                        <div class="bg-red-50 p-4 rounded">
                            <p class="text-red-700 mb-4">Once deleted, this order and all its data will be permanently
                                removed. This action cannot be undone.</p>
                            <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this order? This action cannot be undone.')"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                    Delete Order Permanently
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
