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
        Schema::table('product_transactions', function (Blueprint $table) {
            $table->json('products')->after('notes')->nullable(); // Add the 'products' column
        });
    }

    public function down(): void
    {
        Schema::table('product_transactions', function (Blueprint $table) {
            $table->dropColumn('products');
        });
    }
};
