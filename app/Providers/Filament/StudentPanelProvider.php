<?php

namespace App\Providers\Filament;

use App\Http\Middleware\CheckEnrollmentStatus;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Student\Pages\StudentDashboard;
use App\Filament\Student\Pages\EditProfile;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class StudentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('student')
            ->path('student')
            ->login()
            ->registration()
            ->passwordReset()
            ->profile(\App\Filament\Student\Pages\EditProfile::class)
            
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('2.75rem')
            ->brandName('Goshen Work Skill Association')
            ->favicon(asset('favicon.ico'))
            
            ->colors([
                'primary' => '#091c3d',
                'gray' => Color::Zinc,
                'info' => '#1e3a5f',
                'warning' => '#f5a524',
                'danger' => '#c1121f',
                'success' => Color::Emerald,
            ])
            
            ->font('Inter')
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->renderHook(
                'panels::styles.after',
                fn () => view('filament-student-branding'),
            )
            
            ->discoverResources(in: app_path('Filament/Student/Resources'), for: 'App\\Filament\\Student\\Resources')
            ->discoverPages(in: app_path('Filament/Student/Pages'), for: 'App\\Filament\\Student\\Pages')
            ->pages([
                StudentDashboard::class,
            ])
            ->widgets([
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
            ->authMiddleware([
                Authenticate::class,
                CheckEnrollmentStatus::class,
            ]);
    }
}