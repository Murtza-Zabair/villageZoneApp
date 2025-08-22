<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class OrderController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('admin'),
        ];
    }

    public function index()
    {
        $orders = Order::with('orderItems')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('orderItems');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,delivered,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Order status updated successfully.');
    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return redirect()->route('admin.orders.index')
                ->with('success', 'Order deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.index')
                ->with('error', 'Failed to delete order.');
        }
    }
}
