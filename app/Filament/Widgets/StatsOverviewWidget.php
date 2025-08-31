<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProducts = Product::where('is_active', true)->count();
        $totalCategories = ProductCategory::where('is_active', true)->count();

        return [
            Stat::make('Toplam Ürünler', $totalProducts)
                ->description('Aktif ürün sayısı')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success')
                ->chart([7, 12, 10, 15, 13, 16, $totalProducts]),

            Stat::make('Ürün Kategorileri', $totalCategories)
                ->description('Aktif kategori sayısı')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info')
                ->chart([3, 4, 5, 4, 5]),
        ];
    }

    protected static ?int $sort = 0;

    protected function getColumns(): int
    {
        return 2;
    }
}
