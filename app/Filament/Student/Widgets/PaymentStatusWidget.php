<?php

namespace App\Filament\Student\Widgets;

use Filament\Widgets\Widget;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class PaymentStatusWidget extends Widget
{
    protected string $view = 'filament.widgets.payment-status';

    protected int | string | array $columnSpan = 2;

    public function getEnrollments()
    {
        return Enrollment::where('user_id', Auth::id())
            ->whereIn('payment_status', ['pending', 'partial', 'overdue'])
            ->with('course')
            ->get();
    }
}
