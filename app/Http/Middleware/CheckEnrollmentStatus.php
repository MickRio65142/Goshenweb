<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEnrollmentStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'student') {
            $suspended = \App\Models\Enrollment::where('user_id', Auth::id())
                ->where('status', 'suspended')
                ->exists();

            if ($suspended) {
                Auth::logout();
                return redirect()->route('filament.student.auth.login')
                    ->with('error', 'Your account has been suspended due to outstanding fees. Please contact administration.');
            }
        }

        return $next($request);
    }
}
