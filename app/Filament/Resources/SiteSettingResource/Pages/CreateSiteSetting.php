<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSiteSetting extends CreateRecord
{
    protected static string $resource = SiteSettingResource::class;

    protected static ?string $title = 'Site Ayarı Ekle';

    protected static bool $canCreateAnother = false;

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
