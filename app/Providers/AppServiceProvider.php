<?php

namespace App\Providers;

use App\Http\View\Composers\HeaderComposer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SiteSetting;
use App\Observers\ProductCategoryObserver;
use App\Observers\ProductObserver;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Support\Facades\FilamentView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Observer'ları kaydet
        Product::observe(ProductObserver::class);
        ProductCategory::observe(ProductCategoryObserver::class);

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['tr', 'en']); // also accepts a closure
        });

        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn (): View => view('filament.login_extra')
        );

        // Site ayarlarını tüm view'larda kullanılabilir hale getir
        ViewFacade::composer('*', function ($view) {
            $siteSettings = SiteSetting::getCached();
            $view->with('siteSettings', $siteSettings);
        });

        // Header kompozeri için kategorileri sağla
        ViewFacade::composer('site.layouts.header', HeaderComposer::class);
    }
}
