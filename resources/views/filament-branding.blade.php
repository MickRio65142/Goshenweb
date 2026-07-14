<!-- resources/views/filament-branding.blade.php -->
@php
    $isGetRequest = request()->isMethod('get');
    
    $isProfilePage = $isGetRequest && request()->routeIs('filament.*.auth.profile');

    if ($isGetRequest) {
        $isAuthPage = !$isProfilePage && request()->routeIs('filament.*.auth.*') || 
                      str_contains(request()->path(), 'login') || 
                      str_contains(request()->path(), 'register') ||
                      str_contains(request()->path(), 'password-reset');
    } else {
        $isAuthPage = str_contains(request()->headers->get('referer', ''), 'login') || 
                      str_contains(request()->headers->get('referer', ''), 'register') ||
                      str_contains(request()->headers->get('referer', ''), 'password-reset');
    }

    $portalName = 'Secure Portal';
    $pathToInspect = request()->path();
    if ($pathToInspect === 'livewire/update') {
        $pathToInspect = request()->headers->get('referer', '');
    }

    if (str_contains($pathToInspect, 'admin')) {
        $portalName = 'Admin Portal';
    } elseif (str_contains($pathToInspect, 'student')) {
        $portalName = 'Student Portal';
    }
@endphp

@if($section === 'styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endif

@if($isAuthPage)

    @if($section === 'styles')
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            html, body {
                font-family: 'Plus Jakarta Sans', sans-serif !important;
                background: #111212 !important;
            }
            .fi-simple-header > a:first-child, .fi-logo { display: none !important; }
            .fi-simple-layout {
                background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1920&q=80') !important;
                background-size: cover !important;
                background-position: center !important;
                background-attachment: fixed !important;
                padding-top: 12vh !important;
                padding-bottom: 8vh !important;
            }
            .fi-simple-layout::before {
                content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(9, 28, 61, 0.95), rgba(9, 28, 61, 0.85)); z-index: 0;
            }
            .fi-simple-main {
                background: rgba(255, 255, 255, 0.05) !important; 
                backdrop-filter: blur(16px) !important; 
                -webkit-backdrop-filter: blur(16px) !important;
                border: 1px solid rgba(255, 255, 255, 0.1) !important; 
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6) !important; 
                border-radius: 1.5rem !important; 
                padding: 2rem !important;
                max-width: 28rem !important;
                margin: 0 auto !important;
                width: 100% !important;
            }
            .fi-simple-main p, .fi-simple-main label, .fi-simple-main span:not(.custom-badge) { color: #ffffff !important; word-break: break-word !important; }
            .fi-simple-main input:not([type="checkbox"]):not([type="radio"]) {
                background: #ffffff !important;
                border: 1px solid #cbd5e1 !important;
                color: #0f172a !important;
                border-radius: 0.5rem !important;
                width: 100% !important;
                padding: 0.5rem 0.75rem !important;
                font-size: 0.875rem !important;
                height: auto !important;
                min-height: 2.5rem !important;
            }
            .fi-simple-main input:not([type="checkbox"]):not([type="radio"]):focus { border-color: #c1121f !important; box-shadow: 0 0 0 1px #c1121f !important; outline: none !important; }
            .fi-simple-main input[type="checkbox"] {
                width: 1rem !important;
                height: 1rem !important;
                min-height: auto !important;
                accent-color: #c1121f !important;
                background: rgba(255, 255, 255, 0.15) !important;
                border: 1px solid rgba(255, 255, 255, 0.4) !important;
                border-radius: 0.25rem !important;
                cursor: pointer !important;
            }
            .fi-simple-main input[type="checkbox"]:checked {
                background-color: #c1121f !important;
                border-color: #c1121f !important;
            }
            .fi-simple-main input:-webkit-autofill { -webkit-box-shadow: 0 0 0 30px #ffffff inset !important; -webkit-text-fill-color: #0f172a !important; transition: background-color 5000s ease-in-out 0s; }
            .fi-simple-main button[type="submit"] {
                background-color: #c1121f !important;
                color: white !important;
                transition: all 0.3s ease !important;
                width: 100% !important;
                padding: 0.625rem 1rem !important;
                font-size: 0.875rem !important;
                border-radius: 0.5rem !important;
                text-transform: uppercase !important;
                font-weight: 700 !important;
                letter-spacing: 0.05em !important;
            }
            .fi-simple-main button[type="submit"]:hover { background-color: #091c3d !important; }
            .fi-simple-main a { color: #fcfcfc !important; font-weight: bold !important; word-break: break-word !important; }
            .fi-simple-main a:hover { color: #f5a524 !important; }

            .fi-simple-main .space-y-5 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse))) !important;
                margin-bottom: calc(1rem * var(--tw-space-y-reverse)) !important;
            }

            @media (max-width: 640px) {
                .fi-simple-layout {
                    padding-top: 6rem !important;
                    padding-bottom: 3rem !important;
                }
                .fi-simple-main {
                    padding: 1.5rem !important;
                    border-radius: 1rem !important;
                    max-width: 90vw !important;
                }
            }
        </style>
    @endif

    @if($section === 'header')
        @include('partials.header')
    @endif

    @if($section === 'logo')
        <div wire:ignore class="flex flex-col items-center justify-center text-center mt-2 mb-6 md:mb-8 relative z-10 px-4">
            <div class="bg-white p-2 md:p-3 rounded-2xl md:rounded-[1.5rem] shadow-[0_10px_30px_rgba(0,0,0,0.5)] mb-3 md:mb-4 w-20 h-20 md:w-28 md:h-28 flex items-center justify-center border-2 md:border-4 border-white/10 hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo.png') }}" onerror="this.src='https://placehold.co/200x200/ffffff/091c3d?text=GWSA'" class="w-full h-full object-contain" alt="Goshen Logo">
            </div>
            <h1 class="text-2xl md:text-4xl font-bold text-white tracking-wide mb-0 pb-0 break-words" style="font-family: 'Playfair Display', serif;">Goshen Work Skill</h1>
            <h2 class="text-lg md:text-2xl font-bold text-[#c1121f] uppercase tracking-widest mt-1 mb-4 break-words" style="font-family: 'Plus Jakarta Sans', sans-serif;">Association</h2>
            <span class="custom-badge px-5 py-1.5 md:px-6 md:py-2 bg-[#c1121f] text-white text-[10px] md:text-[11px] font-bold uppercase tracking-widest rounded-full shadow-lg border border-[#c1121f]/50">{{ $portalName }}</span>
        </div>
    @endif

    @if($section === 'footer')
        @include('partials.footer')
        @include('partials.widgets')
    @endif

@endif
