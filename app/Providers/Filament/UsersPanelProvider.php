<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasIcon;
use Filament\Widgets;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Spatie\Permission\Middleware\RoleMiddleware;
use TomatoPHP\FilamentSubscriptions\FilamentSubscriptionsProvider;
use Rupadana\FilamentAnnounce\FilamentAnnouncePlugin;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

class UsersPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('users')
            ->path('user')
            ->colors([
                'primary' => Color::Blue,
                'secondary' => Color::Green

            ])
            ->brandName('Dashboard')
            ->homeUrl('/')
            ->login()
            ->registration()
            ->topNavigation()
            ->topbar()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Users/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Users/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,

            ])
            ->plugins([
    \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
     FilamentAnnouncePlugin::make()
                    ->pollingInterval('30s')
                    ->defaultColor(Color::Blue),
                   BreezyCore::make()
    ->myProfile(
        shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
        userMenuLabel: 'My Profile', // Customizes the 'account' link label in the panel User Menu (default = null)
        shouldRegisterNavigation: true, // Adds a main navigation item for the My Profile page (default = false)
        navigationGroup: 'profile', // Sets the navigation group for the My Profile page (default = null)
        hasAvatars: false, // Enables the avatar upload form component (default = false)
        slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')

    )
    ->enableTwoFactorAuthentication(
        force: false, // force the user to enable 2FA before they can use the application (default = false)
    )
     ->enableBrowserSessions(condition: true)

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
                \Edwink\FilamentUserActivity\Http\Middleware\RecordUserActivity::class

            ])

            ->authMiddleware([
                Authenticate::class,




            ]);
    }
}
