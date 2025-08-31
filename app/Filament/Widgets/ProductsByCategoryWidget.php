<?php

namespace App\Filament\Widgets;

use App\Models\ProductCategory;
use Filament\Widgets\ChartWidget;

class ProductsByCategoryWidget extends ChartWidget
{
    protected static ?string $heading = 'Kategoriye Göre Ürün Dağılımı';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $categories = ProductCategory::query()
            ->with('products')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $labels = [];
        $data = [];
        $backgroundColors = [];

        foreach ($categories as $category) {
            $productCount = $category->products()->where('is_active', true)->count();

            $labels[] = $category->name;
            $data[] = $productCount;
            $backgroundColors[] = $category->color ?? '#6B7280';
        }

        return [
            'datasets' => [
                [
                    'label' => 'Ürün Sayısı',
                    'data' => $data,
                    'backgroundColor' => $backgroundColors,
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'enabled' => true,
                    'callbacks' => [
                        'label' => 'function(context) {
                            return context.label + ": " + context.formattedValue + " ürün";
                        }',
                    ],
                ],
            ],
        ];
    }

    protected function getPollingInterval(): ?string
    {
        return '30s';
    }
}
