<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function home()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('dashboard');
        }

        try {
            $featuredProducts = Product::where('stock', '>', 0)
                ->take(8)
                ->get();

            return view('web.home', compact('featuredProducts'));
        } catch (\Exception $e) {

            $featuredProducts = collect([]);
            return view('web.home', compact('featuredProducts'));
        }
    }

    public function market(Request $request)
    {
        try {
            $query = Product::where('stock', '>', 0);

            $products = $query->paginate(12)->appends($request->all());
            $categories = Product::select('category')->distinct()->whereNotNull('category')->pluck('category');

            return view('web.market', compact('products', 'categories'));
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to load products at the moment.');
        }
    }

    public function showProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            $relatedProducts = Product::where('category', $product->category)
                ->where('id', '!=', $product->id)
                ->take(4)
                ->get();

            return view('web.product', compact('product', 'relatedProducts'));
        } catch (\Exception $e) {
            return redirect()->route('market')->with('error', 'Product not found.');
        }
    }

    public function healthcare()
    {
        return view('web.healthcare');
    }

    public function farmingTips()
    {
        return view('web.farming-tips');
    }

    //contact section

    public function contact()
    {
        return view('web.contact');
    }

    public function storeContact(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:2000',
            ]);

            Message::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            return back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send message. Please try again.');
        }
    }

    //about

    public function about()
    {
        return view('web.about');
    }
    public function addToCart(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1'
            ]);

            $product = Product::findOrFail($request->product_id);

            if ($product->stock < $request->quantity) {
                return back()->with('error', 'Insufficient stock available.');
            }

            $cart = Session::get('cart', []);

            if (isset($cart[$request->product_id])) {
                $cart[$request->product_id]['quantity'] += $request->quantity;
            } else {
                $cart[$request->product_id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'image' => $product->image,
                ];
            }

            Session::put('cart', $cart);

            return back()->with('success', 'Product added to cart!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to add product to cart.');
        }
    }

    public function cart()
    {
        $cart = Session::get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('web.cart', compact('cart', 'total'));
    }

    public function updateCart(Request $request, $productId)
    {
        try {
            $cart = Session::get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $request->quantity;
                Session::put('cart', $cart);
                return back()->with('success', 'Cart updated successfully!');
            }

            return back()->with('error', 'Product not found in cart.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update cart.');
        }
    }

    public function removeFromCart($productId)
    {
        try {
            $cart = Session::get('cart', []);

            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                Session::put('cart', $cart);
                return back()->with('success', 'Product removed from cart!');
            }

            return back()->with('error', 'Product not found in cart.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to remove product from cart.');
        }
    }

    public function checkout()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('market')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('web.checkout', compact('cart', 'total'));
    }

    public function storeOrder(Request $request)
    {
        try {
            $request->validate([
                'customer_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'message' => 'nullable|string|max:1000'
            ]);

            $cart = Session::get('cart', []);

            if (empty($cart)) {
                return redirect()->route('market')->with('error', 'Your cart is empty.');
            }

            DB::beginTransaction();

            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'customer_name' => $request->customer_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
                'total_amount' => $totalAmount,
                'status' => 'pending'
            ]);

            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);
                if ($product) {
                    $product->decrement('stock', $item['quantity']);

                    $order->orderItems()->create([
                        'product_id' => $productId,
                        'product_name' => $item['name'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price']
                    ]);
                }
            }

            Session::forget('cart');
            DB::commit();

            return redirect()->route('home')->with('success', 'Order placed successfully! We will contact you soon. Order number: ' . $order->order_number);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to place order. Please try again.');
        }
    }

    public function myOrders()
    {
        try {
            $orders = Auth::user()->orders()
                ->with('orderItems')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('web.my-orders', compact('orders'));
        } catch (\Exception $e) {
            return view('web.my-orders', ['orders' => collect([])]);
        }
    }
}