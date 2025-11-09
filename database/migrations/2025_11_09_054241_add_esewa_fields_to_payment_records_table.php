<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payment_records', function (Blueprint $table) {
            $table->string('payment_method', 50)->default('cash')->after('year'); // cash, esewa, khalti, bank
            $table->string('transaction_id', 100)->nullable()->after('payment_method'); // eSewa transaction ID
            $table->string('payment_gateway', 50)->nullable()->after('transaction_id'); // esewa, khalti, etc
            $table->text('gateway_response')->nullable()->after('payment_gateway'); // JSON response from gateway
            $table->string('payment_status', 20)->default('pending')->after('gateway_response'); // pending, completed, failed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_records', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'transaction_id', 'payment_gateway', 'gateway_response', 'payment_status']);
        });
    }
};
