<?php

namespace App\Http\View\Composers;

use App\Models\ProductCategory;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = ProductCategory::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        $view->with('categories', $categories);
    }
}
