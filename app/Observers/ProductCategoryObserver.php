<?php

namespace App\Observers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;

class ProductCategoryObserver
{
    /**
     * Handle the ProductCategory "created" event.
     */
    public function created(ProductCategory $productCategory): void
    {
        $this->clearCache();
    }

    /**
     * Handle the ProductCategory "updated" event.
     */
    public function updated(ProductCategory $productCategory): void
    {
        $this->clearCache();
    }

    /**
     * Handle the ProductCategory "deleted" event.
     */
    public function deleted(ProductCategory $productCategory): void
    {
        $this->clearCache();
    }

    /**
     * Handle the ProductCategory "restored" event.
     */
    public function restored(ProductCategory $productCategory): void
    {
        $this->clearCache();
    }

    /**
     * Handle the ProductCategory "force deleted" event.
     */
    public function forceDeleted(ProductCategory $productCategory): void
    {
        $this->clearCache();
    }

    /**
     * Clear category-related cache keys.
     */
    private function clearCache(): void
    {
        Cache::forget('active_categories');
        Cache::forget('active_products_with_categories'); // Ürünler de kategorilere bağlı
    }
}
