<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('web.home');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->is_admin) {
        return view('dashboard');
    }
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/market', [WebController::class, 'market'])->name('market');
Route::get('/product/{id}', [WebController::class, 'showProduct'])->name('product.show');
Route::get('/healthcare', [WebController::class, 'healthcare'])->name('healthcare');
Route::get('/farming-tips', [WebController::class, 'farmingTips'])->name('farming.tips');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::post('/contact', [WebController::class, 'storeContact'])->name('contact.store');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/cart', [WebController::class, 'cart'])->name('cart');
Route::get('/checkout', [WebController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/cart/add', [WebController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{productId}', [WebController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{productId}', [WebController::class, 'removeFromCart'])->name('cart.remove');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/orders', [WebController::class, 'storeOrder'])->name('orders.store');
    Route::get('/my-orders', [WebController::class, 'myOrders'])->name('orders.my');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
    Route::resource('customers', AdminCustomerController::class);
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'destroy']);
    Route::patch('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('orders.updateStatus');
    Route::resource('messages', AdminMessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('messages/{message}/reply', [AdminMessageController::class, 'reply'])
        ->name('messages.reply');
});


require __DIR__ . '/auth.php';
