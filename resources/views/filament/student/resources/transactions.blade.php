<x-filament-panels::page>
    @php
        $txns = \App\Models\Transaction::where('user_id', auth()->id())->latest()->get();
        $totalSpent = $txns->where('status', 'completed')->sum('amount');
        $pendingAmount = $txns->where('status', 'pending')->sum('amount');
        $completedCount = $txns->where('status', 'completed')->count();
        $pendingCount = $txns->where('status', 'pending')->count();
    @endphp
    <div id="dash" x-data="{
        search: new URLSearchParams(window.location.search).get('search') || '',
        mobileSidebar: false,
        items: {{ json_encode($txns->map(fn($t) => [
            'amount' => number_format($t->amount, 0, ',', ' ') . ' XAF',
            'type' => match($t->type) { 'enrollment_fee' => 'Enrollment Fee', 'registration_fee' => 'Registration Fee', 'refund' => 'Refund', default => ucfirst(str_replace('_', ' ', $t->type)) },
            'method' => match($t->payment_method) { 'MTN_MoMo' => 'MTN MoMo', 'Orange_Money' => 'Orange Money', 'Bank_Transfer' => 'Bank Transfer', 'Credit_Debit_Card' => 'Credit/Debit Card', default => str_replace('_', ' ', $t->payment_method) },
            'status' => $t->status,
            'statusColor' => match($t->status) { 'completed' => '#16a34a', 'pending' => '#f5a524', 'failed' => '#dc2626', 'refunded' => '#1e3a5f', default => '#64748b' },
            'reference' => $t->reference,
            'date' => $t->created_at->format('M d, Y - g:i A'),
        ])) }},
        get filtered() {
            if (!this.search) return this.items;
            const q = this.search.toLowerCase();
            return this.items.filter(i => i.type.toLowerCase().includes(q) || i.status.toLowerCase().includes(q) || i.reference.toLowerCase().includes(q) || i.method.toLowerCase().includes(q));
        }
    }">
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
                <template x-if="filtered.length === 0 && search">
                    <div class="empty-state"><i class="fas fa-search"></i><h3>No matches</h3><p>No transactions match "<span x-text="search"></span>"</p></div>
                </template>
                <template x-if="filtered.length === 0 && !search">
                    <div class="empty-state"><i class="fas fa-credit-card"></i><h3>No Transactions</h3><p>Your payment history will appear here</p></div>
                </template>
                <template x-if="filtered.length > 0">
                    <div class="resource-list">
                        <template x-for="item in filtered" :key="item.reference">
                            <div class="resource-item">
                                <div class="resource-item-icon" :style="'background:' + item.statusColor + '15;color:' + item.statusColor"><i class="fas fa-receipt"></i></div>
                                <div class="resource-item-body">
                                    <div class="resource-item-title" x-text="item.amount"></div>
                                    <div class="resource-item-meta">
                                        <span x-text="item.type"></span>
                                        <span>·</span>
                                        <span x-text="item.method"></span>
                                        <span>·</span>
                                        <span class="resource-item-badge" :style="'background:' + item.statusColor + '15;color:' + item.statusColor" x-text="item.status.charAt(0).toUpperCase() + item.status.slice(1)"></span>
                                    </div>
                                    <div class="resource-item-meta" style="margin-top:4px;">
                                        <span style="font-size:11px;color:var(--text-light);" x-text="'Ref: ' + item.reference"></span>
                                        <span style="font-size:11px;color:var(--text-light);" x-text="item.date"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>
