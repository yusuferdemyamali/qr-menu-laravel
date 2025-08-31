<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestProductsWidget extends BaseWidget
{
    protected static ?string $heading = 'Son Eklenen Ürünler';

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()
                    ->with('category')
                    ->where('is_active', true)
                    ->latest()
                    ->limit(8)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Ürün Adı')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (Product $record): string => $record->category?->color ?
                        $this->hexToTailwindColor($record->category->color) : 'gray')
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Fiyat')
                    ->money('TRY')
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('created_at')
                    ->label('Eklenme Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated(false);
    }

    private function hexToTailwindColor(string $hex): string
    {
        // Hex renkleri Tailwind renklerine çevir
        $colorMap = [
            '#e74c3c' => 'danger',
            '#3498db' => 'info',
            '#f39c12' => 'warning',
            '#e67e22' => 'primary',
            '#27ae60' => 'success',
        ];

        return $colorMap[$hex] ?? 'gray';
    }
}
