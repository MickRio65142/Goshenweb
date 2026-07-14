<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentView;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (app()->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Inject custom styles into the HTML Head
        FilamentView::registerRenderHook(
            'panels::head.end',
            fn (): string => view('filament-branding', ['section' => 'styles'])->render(),
        );

        // Inject custom header at the start of the Body
        FilamentView::registerRenderHook(
            'panels::body.start',
            fn (): string => view('filament-branding', ['section' => 'header'])->render(),
        );

        // Inject custom Goshen Logo & Badge on auth pages (Login, Register, Forgot Password)
        $authHooks = [
            'panels::auth.login.form.before',
            'panels::auth.register.form.before',
            'panels::auth.password-reset.request.form.before',
            'panels::auth.password-reset.reset.form.before',
        ];

        foreach ($authHooks as $hook) {
            FilamentView::registerRenderHook(
                $hook,
                fn (): string => view('filament-branding', ['section' => 'logo'])->render(),
            );
        }

        // Inject custom footer, WhatsApp sidebars, and chat widget at the end of the Body
        FilamentView::registerRenderHook(
            'panels::body.end',
            fn (): string => view('filament-branding', ['section' => 'footer'])->render(),
        );

        // Add Google login button to auth pages
        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn (): string => view('socialite-login')->render(),
        );
    }
}