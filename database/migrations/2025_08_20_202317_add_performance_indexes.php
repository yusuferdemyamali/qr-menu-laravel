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
        Schema::table('products', function (Blueprint $table) {
            // is_active sütunu için index ekleme (WHERE clause'larda sık kullanılıyor)
            $table->index('is_active', 'idx_products_is_active');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            // is_active sütunu için index
            $table->index('is_active', 'idx_product_categories_is_active');

            // sort_order sütunu için index (ORDER BY'da kullanılıyor)
            $table->index('sort_order', 'idx_product_categories_sort_order');

            // Birleşik index: is_active ve sort_order beraber sorgulanıyor
            $table->index(['is_active', 'sort_order'], 'idx_product_categories_active_sort');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_is_active');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropIndex('idx_product_categories_is_active');
            $table->dropIndex('idx_product_categories_sort_order');
            $table->dropIndex('idx_product_categories_active_sort');
        });
    }
};
