<x-filament-panels::page>
    @php
        $txns = \App\Models\Transaction::where('user_id', auth()->id())->latest()->get();
        $totalSpent = $txns->where('status', 'completed')->sum('amount');
        $pendingAmount = $txns->where('status', 'pending')->sum('amount');
        $completedCount = $txns->where('status', 'completed')->count();
        $pendingCount = $txns->where('status', 'pending')->count();
    @endphp
    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
        <x-student.dash-layout title="Transactions">
            <div class="dash-content">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#091c3d15;color:#091c3d"><i class="fas fa-credit-card"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ count($txns) }}</div>
                            <div class="stat-label">Total Transactions</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-check-circle"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ $completedCount }}</div>
                            <div class="stat-label">Completed</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#f5a52415;color:#f5a524"><i class="fas fa-clock"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ number_format($pendingAmount, 0, ',', ' ') }} XAF</div>
                            <div class="stat-label">Pending Amount</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#16a34a15;color:#16a34a"><i class="fas fa-coins"></i></div>
                        <div class="stat-info">
                            <div class="stat-value">{{ number_format($totalSpent, 0, ',', ' ') }} XAF</div>
                            <div class="stat-label">Total Spent</div>
                        </div>
                    </div>
                </div>
                @if(count($txns))
                    <div class="resource-list">
                        @foreach($txns as $t)
                            @php
                                $typeLabel = match($t->type) {
                                    'enrollment_fee' => 'Enrollment Fee',
                                    'registration_fee' => 'Registration Fee',
                                    'refund' => 'Refund',
                                    default => ucfirst(str_replace('_', ' ', $t->type)),
                                };
                                $statusColor = match($t->status) {
                                    'completed' => '#16a34a',
                                    'pending' => '#f5a524',
                                    'failed' => '#dc2626',
                                    'refunded' => '#1e3a5f',
                                    default => '#64748b',
                                };
                                $pmLabel = match($t->payment_method) {
                                    'MTN_MoMo' => 'MTN MoMo',
                                    'Orange_Money' => 'Orange Money',
                                    'Bank_Transfer' => 'Bank Transfer',
                                    'Credit_Debit_Card' => 'Credit/Debit Card',
                                    default => str_replace('_', ' ', $t->payment_method),
                                };
                            @endphp
                            <div class="resource-item">
                                <div class="resource-item-icon" style="background:{{ $statusColor }}15;color:{{ $statusColor }}"><i class="fas fa-receipt"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title">{{ number_format($t->amount, 0, ',', ' ') }} XAF</div>
                                    <div class="resource-item-meta">
                                        <span>{{ $typeLabel }}</span>
                                        <span>·</span>
                                        <span>{{ $pmLabel }}</span>
                                        <span>·</span>
                                        <span class="resource-item-badge" style="background:{{ $statusColor }}15;color:{{ $statusColor }}">{{ ucfirst($t->status) }}</span>
                                    </div>
                                    <div class="resource-item-meta" style="margin-top:4px;">
                                        <span style="font-size:11px;color:var(--text-light);">Ref: {{ $t->reference }}</span>
                                        <span style="font-size:11px;color:var(--text-light);">{{ $t->created_at->format('M d, Y - g:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state"><i class="fas fa-credit-card"></i><h3>No Transactions</h3><p>Your payment history will appear here</p></div>
                @endif
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
