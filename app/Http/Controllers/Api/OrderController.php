<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public static function middleware(): array
    {
        return [
            new \Illuminate\Routing\Controllers\Middleware('auth:sanctum'),
        ];
    }

    public function index(Request $request)
    {
        $orders = $request->user()
            ->orders()
            ->with(['orderItems.product'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'items'                     => 'required|array|min:1',
            'items.*.product_id'        => 'required|exists:products,id',
            'items.*.quantity'          => 'required|integer|min:1',
            'shipping_address'          => 'required|array',
            'shipping_address.street'   => 'required|string',
            'shipping_address.city'     => 'required|string',
            'shipping_address.state'    => 'required|string',
            'shipping_address.zip_code' => 'required|string',
            'shipping_address.country'  => 'required|string',
        ]);


        try {
            DB::beginTransaction();

            $totalAmount = 0;
            $orderItems = [];

            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);

                if (!$product || !$product->is_active || $product->stock < $item['quantity']) {
                    return response()->json([
                        'error' => "Product '{$product?->name}' is not available or insufficient stock",
                    ], 400);
                }

                $itemTotal   = $product->price * $item['quantity'];
                $totalAmount += $itemTotal;

                $orderItems[] = [
                    'product_id' => $product->id,
                    'quantity'   => $item['quantity'],
                    'price'      => $product->price,
                ];

                $product->decrement('stock', $item['quantity']);
            }

            $order = Order::create([
                'user_id'          => $request->user()->id,
                'order_number'     => 'ORD-' . strtoupper(uniqid()),
                'total_amount'     => $totalAmount,
                'status'           => 'pending',
                'shipping_address' => $request->shipping_address,
                'payment_status'   => 'pending',
            ]);

            $order->orderItems()->createMany($orderItems);

            DB::commit();

            $order->load(['orderItems.product']);

            return response()->json([
                'message' => 'Order placed successfully',
                'order'   => $order,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'Failed to place order',
            ], 500);
        }
    }

    public function show(Request $request, Order $order)
    {
        if ($order->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $order->load(['orderItems.product']);
        return response()->json($order);
    }

    public function cancel(Request $request, Order $order)
    {
        if ($order->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if (!in_array($order->status, ['pending', 'processing'])) {
            return response()->json([
                'error' => 'Order cannot be cancelled',
            ], 400);
        }

        DB::beginTransaction();
        try {
            foreach ($order->orderItems as $item) {
                $item->product->increment('stock', $item->quantity);
            }

            $order->update(['status' => 'cancelled']);
            DB::commit();

            return response()->json([
                'message' => 'Order cancelled successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'Failed to cancel order',
            ], 500);
        }
    }
}
