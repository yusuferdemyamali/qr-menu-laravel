<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Widget;

class SystemInfoWidget extends Widget
{
    protected static string $view = 'filament.widgets.system-info-widget';

    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    protected function getViewData(): array
    {
        return [
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'server_time' => Carbon::now()->format('d.m.Y H:i:s'),
            'timezone' => config('app.timezone'),
            'environment' => config('app.env'),
            'debug_mode' => config('app.debug') ? 'Açık' : 'Kapalı',
        ];
    }
}
