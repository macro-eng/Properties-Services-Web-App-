<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
// use Filament\Pages\Dashboard;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use App\Filament\Resources\BookingResource\Widgets\BookingChart;
use App\Filament\Resources\PropertyResource\Widgets\PropertiesChart;
use App\Filament\Resources\PropertyResource\Widgets\LatestProperties;
use App\Filament\Resources\PropertyResource\Widgets\StatsOverview;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
class AdminPanelProvider extends PanelProvider
{


    public function panel(Panel $panel): Panel
    {
        return $panel
          ->sidebarCollapsibleOnDesktop()
     
            ->id('admin')
            ->path('admin')
            ->login()
            ->default()
            ->globalSearchDebounce('750ms')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([ ])
            // ->topbar(false)
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                StatsOverview::class,
                // LatestProperties::class,
               PropertiesChart::class,
               BookingChart::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make()
                ->gridColumns([
                    'default'=>1,
                    'sm'=>2,
                    'lg'=>3
                    ])
                ->sectionColumnSpan(1)
            
                    ->resourceCheckboxListColumns([
                        'default'=>1,
                        'sm'=>2,
                    ]),
                    FilamentShieldPlugin::make(),
                    FilamentSpatieRolesPermissionsPlugin::make(),

                        ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
