<!-- resources/views/filament-login-css.blade.php -->
@if(request()->routeIs('filament.*.auth.*'))
<style>
    .fi-simple-layout {
        background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1920&q=80') !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-attachment: fixed !important; 
        position: relative;
        padding-top: 15vh !important;
        padding-bottom: 10vh !important;
    }
    
    .fi-simple-layout::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(32, 66, 93, 0.9), rgba(15, 23, 42, 0.8));
        z-index: 0;
    }

    .fi-simple-layout > * {
        z-index: 1;
        position: relative;
    }

    .fi-simple-main {
        background: rgba(15, 23, 42, 0.4) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6) !important;
        border-radius: 1.5rem !important;
        padding: 2rem 2rem !important;
        max-width: 28rem !important;
        margin: 0 auto !important;
        width: 100% !important;
    }

    .fi-simple-main h1, 
    .fi-simple-main h2, 
    .fi-simple-main p, 
    .fi-simple-main span, 
    .fi-simple-main label {
        color: #ffffff !important;
        word-break: break-word !important;
        white-space: normal !important;
    }

    .fi-logo {
        color: #f5a524 !important;
        font-size: 1.75rem !important;
        font-weight: bold !important;
        letter-spacing: 1px;
        text-align: center !important;
    }

    .fi-simple-main input:not([type="checkbox"]):not([type="radio"]), .fi-simple-main select {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        color: #ffffff !important;
        border-radius: 0.5rem !important;
        box-shadow: none !important;
        width: 100% !important;
        padding: 0.5rem 0.75rem !important;
        font-size: 0.875rem !important;
        height: auto !important;
        min-height: 2.5rem !important;
    }
    
    .fi-simple-main input:not([type="checkbox"]):not([type="radio"]):focus {
        border-color: #f5a524 !important;
        outline: none !important;
        box-shadow: 0 0 0 1px #f5a524 !important;
    }

    .fi-simple-main input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 30px rgba(32, 66, 93, 1) inset !important;
        -webkit-text-fill-color: white !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    .fi-simple-main input[type="checkbox"] {
        width: 1rem !important;
        height: 1rem !important;
        min-height: auto !important;
        min-width: auto !important;
        accent-color: #f5a524 !important;
        background: rgba(255, 255, 255, 0.15) !important;
        border: 1px solid rgba(255, 255, 255, 0.4) !important;
        border-radius: 0.25rem !important;
        cursor: pointer !important;
    }
    .fi-simple-main input[type="checkbox"]:checked {
        background-color: #f5a524 !important;
        border-color: #f5a524 !important;
    }

    .fi-simple-main button[type="submit"] {
        background-color: #c1121f !important;
        color: white !important;
        border-radius: 0.5rem !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        border: none !important;
        transition: all 0.3s ease !important;
        width: 100% !important;
        padding: 0.625rem 1rem !important;
        font-size: 0.875rem !important;
    }

    .fi-simple-main button[type="submit"]:hover {
        background-color: #f5a524 !important;
        color: #0f172a !important;
        transform: translateY(-1px);
        box-shadow: 0 10px 15px -3px rgba(245, 165, 36, 0.3) !important;
    }

    .fi-simple-main a {
        color: #f5a524 !important;
        transition: color 0.3s ease;
        word-break: break-word !important;
    }
    .fi-simple-main a:hover {
        color: #ffffff !important;
    }

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
        .fi-logo {
            font-size: 1.4rem !important;
        }
    }
</style>
@endif
