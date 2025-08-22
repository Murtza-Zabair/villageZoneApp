<?php
// Migration for orders table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->text('message')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'delivered', 'cancelled'])
                ->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
