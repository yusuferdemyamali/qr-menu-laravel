<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class QuickActionsWidget extends Widget
{
    protected static string $view = 'filament.widgets.quick-actions-widget';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getViewData(): array
    {
        return [
            'actions' => [
                [
                    'label' => 'Yeni Ürün Ekle',
                    'url' => route('filament.admin.resources.products.create'),
                    'icon' => 'heroicon-o-plus-circle',
                    'color' => 'success',
                    'description' => 'Menüye yeni bir ürün ekleyin',
                ],
                [
                    'label' => 'Kategori Yönetimi',
                    'url' => route('filament.admin.resources.product-categories.index'),
                    'icon' => 'heroicon-o-tag',
                    'color' => 'info',
                    'description' => 'Ürün kategorilerini düzenleyin',
                ],
                [
                    'label' => 'Site Ayarları',
                    'url' => route('filament.admin.resources.site-settings.index'),
                    'icon' => 'heroicon-o-cog-6-tooth',
                    'color' => 'warning',
                    'description' => 'Site genel ayarlarını yönetin',
                ],
                [
                    'label' => 'Menüyü Görüntüle',
                    'url' => '/',
                    'icon' => 'heroicon-o-eye',
                    'color' => 'gray',
                    'description' => 'Canlı menüyü görüntüleyin',
                    'target' => '_blank',
                ],
            ],
        ];
    }
}
