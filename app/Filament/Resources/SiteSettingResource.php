<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Site Yönetimi';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'site_name';

    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $navigationLabel = 'Ayarlar';

    public static function getNavigationUrl(): string
    {
        $record = static::getModel()::first();

        if ($record) {
            return static::getUrl('edit', ['record' => $record]);
        }

        return static::getUrl('create');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Ayarları')
                    ->label(fn () => __('page.general_settings.sections.site'))
                    ->icon('heroicon-o-globe-alt')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\TextInput::make('site_name')
                                ->label('Firma Adı')
                                ->required(),
                            Forms\Components\Toggle::make('is_maintenance')
                                ->label('Bakım Modu')
                                ->helperText('Etkinleştirildiğinde, siteniz ziyaretçilere bir bakım sayfası gösterecektir')
                                ->required(),
                        ]),

                        Forms\Components\Section::make('Marka Ayarları')
                            ->label('Marka ve Görünüş')
                            ->description('Uygulamanızın görsel kimliğini özelleştirin')
                            ->icon('heroicon-o-photo')
                            ->collapsible()
                            ->schema([
                                Forms\Components\Grid::make()->schema([
                                    Forms\Components\FileUpload::make('site_logo')
                                        ->label('Site Logosu')
                                        ->image()
                                        ->directory('sites')
                                        ->visibility('public')
                                        ->moveFiles()
                                        ->helperText('Logonuzu yükleyin.'),

                                    Forms\Components\FileUpload::make('site_favicon')
                                        ->label('Site Faviconu')
                                        ->image()
                                        ->directory('sites')
                                        ->visibility('public')
                                        ->moveFiles()
                                        ->acceptedFileTypes(['image/x-icon', 'image/vnd.microsoft.icon', 'image/png', 'image/jpeg'])
                                        ->helperText('ICO, PNG ve JPG formatlarını destekler'),
                                ])->columns(2)->columnSpan(3),
                            ])->columns(3),

                        Forms\Components\Section::make('Firma Bilgileri')
                            ->description('İletişim bilgileri ve konum bilgileri')
                            ->icon('heroicon-o-building-office')
                            ->collapsible()
                            ->schema([
                                Forms\Components\Grid::make()->schema([
                                    Forms\Components\TextInput::make('site_email')
                                        ->label('Email')
                                        ->email()
                                        ->required()
                                        ->maxLength(100),
                                    Forms\Components\TextInput::make('site_phone')
                                        ->label('Telefon Numarası')
                                        ->tel()
                                        ->maxLength(20),
                                    Forms\Components\Textarea::make('site_address')
                                        ->label('Firma Adresi')
                                        ->rows(2)
                                        ->maxLength(200),
                                    Forms\Components\Textarea::make('site_working_hours')
                                        ->label('Çalışma Saatleri')
                                        ->rows(2)
                                        ->required()
                                        ->maxLength(100),
                                    Forms\Components\Textarea::make('site_maps_embed')
                                        ->label('Harita Embed Kodu')
                                        ->rows(2),
                                ])->columns(2),
                            ]),
                    ]),
                Forms\Components\Section::make('Sosyal Medya Bağlantıları')
                    ->description('Sosyal medya profillerinize bağlantılar')
                    ->icon('heroicon-o-link')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\TextInput::make('site_facebook_url')
                                ->label('Facebook URL')
                                ->url()
                                ->prefix('https://')
                                ->helperText('facebook.com/yourpage'),
                            Forms\Components\TextInput::make('site_twitter_url')
                                ->label('Twitter/X URL')
                                ->url()
                                ->prefix('https://')
                                ->helperText('twitter.com/yourusername'),
                            Forms\Components\TextInput::make('site_instagram_url')
                                ->label('Instagram URL')
                                ->url()
                                ->prefix('https://')
                                ->helperText('instagram.com/yourusername'),
                            Forms\Components\TextInput::make('site_linkedin_url')
                                ->label('LinkedIn URL')
                                ->url()
                                ->prefix('https://')
                                ->helperText('linkedin.com/company/yourcompany'),
                            Forms\Components\TextInput::make('site_youtube_url')
                                ->label('YouTube URL')
                                ->url()
                                ->prefix('https://')
                                ->helperText('youtube.com/channel/your-channel'),
                        ])->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')->label('Site Adı'),
                Tables\Columns\TextColumn::make('site_email')->label('E-posta Adresi'),
                Tables\Columns\TextColumn::make('site_phone')->label('Telefon Numarası'),
                Tables\Columns\TextColumn::make('site_address')->label('Adres'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Sil')->modalHeading('Site Ayarlarını Sil'),
                ])->label('Toplu İşlemler'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
