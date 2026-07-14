<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('reference')->unique();
            $table->string('type'); // enrollment_fee, registration_fee, refund
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('XAF');
            $table->string('payment_method'); // MTN_MoMo, Orange_Money, Bank_Transfer, Credit_Debit_Card
            $table->string('status')->default('pending'); // pending, completed, failed, refunded
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
