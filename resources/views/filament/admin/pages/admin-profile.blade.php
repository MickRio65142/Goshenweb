<x-filament-panels::page>
    @php
        $user = $this->getRecord();
        $avatarUrl = $user->avatar_url
            ? asset('storage/' . $user->avatar_url)
            : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=091c3d&color=fff&size=200';
        $documents = $user->documents()->latest()->get();
        $enrollments = $user->enrollments()->with('course')->latest()->get();
        $grades = $user->grades()->with('course')->latest()->take(10)->get();
        $transactions = $user->transactions()->latest()->take(10)->get();
    @endphp
    <style>
        .vp-container { max-width: 1100px; margin: 0 auto; }
        .vp-profile-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 32px; margin-bottom: 24px; display: flex; align-items: center; gap: 28px; flex-wrap: wrap; }
        .vp-avatar { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid var(--accent-light); flex-shrink: 0; position: relative; }
        .vp-avatar-wrap { position: relative; display: inline-block; flex-shrink: 0; }
        .vp-avatar-upload { position: absolute; bottom: 0; right: 0; background: var(--accent); color: #fff; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 12px; border: 2px solid var(--bg-card); }
        .vp-profile-info { flex: 1; min-width: 200px; }
        .vp-name { font-size: 24px; font-weight: 700; color: var(--text); margin: 0 0 4px; }
        .vp-role { display: inline-block; font-size: 11px; font-weight: 600; padding: 4px 12px; border-radius: 999px; color: #fff; margin-bottom: 8px; }
        .vp-meta { font-size: 13px; color: var(--text-muted); margin: 0; display: flex; flex-wrap: wrap; gap: 16px; }
        .vp-meta span { display: flex; align-items: center; gap: 6px; }
        .vp-section { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; margin-bottom: 20px; }
        .vp-section-title { font-size: 15px; font-weight: 700; color: var(--text); margin: 0 0 16px; display: flex; align-items: center; gap: 10px; }
        .vp-section-title i { font-size: 14px; color: var(--accent); }
        .vp-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media (max-width: 640px) { .vp-grid { grid-template-columns: 1fr; } }
        .vp-field { }
        .vp-field-label { font-size: 11px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: .04em; margin: 0 0 4px; }
        .vp-field-value { font-size: 14px; color: var(--text); margin: 0; font-weight: 500; }
        .vp-field-value.empty { color: var(--text-light); font-style: italic; }
        .vp-table { width: 100%; border-collapse: collapse; font-size: 13px; }
        .vp-table th { text-align: left; padding: 10px 12px; font-size: 11px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: .04em; border-bottom: 1px solid var(--border); background: var(--bg); }
        .vp-table td { padding: 10px 12px; border-bottom: 1px solid var(--border); color: var(--text); }
        .vp-table tr:hover td { background: var(--bg); }
        .vp-status { display: inline-flex; font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 999px; }
        .vp-file-link { color: var(--accent); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 5px; }
        .vp-file-link:hover { text-decoration: underline; }
        .vp-empty { text-align: center; padding: 32px; color: var(--text-light); }
        .vp-empty i { font-size: 28px; margin-bottom: 8px; display: block; }
        .vp-empty p { font-size: 13px; margin: 0; }
        .vp-header-actions { margin-bottom: 24px; display: flex; justify-content: flex-end; gap: 8px; }
    </style>
    <div class="vp-container">
        {{-- Header Actions --}}
        <div class="vp-header-actions">
            <x-filament::button wire:click="editProfile">
                Edit Profile
            </x-filament::button>
        </div>

        {{-- Profile Card --}}
        <div class="vp-profile-card">
            <div class="vp-avatar-wrap">
                <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="vp-avatar" id="admin-avatar">
            </div>
            <div class="vp-profile-info">
                <h1 class="vp-name">{{ $user->name }}</h1>
                <span class="vp-role" style="background: {{ $user->role === 'admin' ? '#c1121f' : '#16a34a' }};">
                    {{ ucfirst($user->role) }}
                </span>
                <p class="vp-meta">
                    <span><i class="fas fa-envelope"></i> {{ $user->email }}</span>
                    <span><i class="fas fa-phone"></i> {{ $user->phone_number ?? '—' }}</span>
                    <span><i class="fas fa-calendar-check"></i> Joined {{ $user->created_at->format('M d, Y') }}</span>
                </p>
            </div>
        </div>

        {{-- Edit Profile Modal --}}
        <x-filament::modal id="edit-profile-modal" heading="Edit Profile" width="lg">
            <form wire:submit="save">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Avatar</label>
                        <input type="file" wire:model="avatar" accept="image/*" class="w-full">
                        @error('avatar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Name</label>
                        <input type="text" wire:model="name" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" wire:model="email" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <hr class="my-2">
                    <p class="text-xs text-gray-500">Leave blank to keep current password</p>
                    <div>
                        <label class="block text-sm font-medium mb-1">Current Password</label>
                        <input type="password" wire:model="current_password" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">New Password</label>
                        <input type="password" wire:model="new_password" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        @error('new_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Confirm New Password</label>
                        <input type="password" wire:model="new_password_confirmation" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <x-filament::button color="gray" wire:click="$dispatch('close-modal', {id: 'edit-profile-modal'})">
                        Cancel
                    </x-filament::button>
                    <x-filament::button type="submit">
                        Save Changes
                    </x-filament::button>
                </div>
            </form>
        </x-filament::modal>

        {{-- Two Column: Personal Info + Emergency Contact --}}
        <div class="vp-grid">
            <div class="vp-section">
                <h3 class="vp-section-title"><i class="fas fa-user"></i> Personal Details</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                    <div class="vp-field">
                        <p class="vp-field-label">Date of Birth</p>
                        <p class="vp-field-value {{ $user->date_of_birth ? '' : 'empty' }}">{{ $user->date_of_birth ? $user->date_of_birth->format('M d, Y') : 'Not provided' }}</p>
                    </div>
                    <div class="vp-field">
                        <p class="vp-field-label">Gender</p>
                        <p class="vp-field-value {{ $user->gender ? '' : 'empty' }}">{{ $user->gender ? ucfirst($user->gender) : 'Not provided' }}</p>
                    </div>
                    <div class="vp-field">
                        <p class="vp-field-label">Nationality</p>
                        <p class="vp-field-value {{ $user->nationality ? '' : 'empty' }}">{{ $user->nationality ?? 'Not provided' }}</p>
                    </div>
                    <div class="vp-field">
                        <p class="vp-field-label">Phone Number</p>
                        <p class="vp-field-value {{ $user->phone_number ? '' : 'empty' }}">{{ $user->phone_number ?? 'Not provided' }}</p>
                    </div>
                    <div class="vp-field" style="grid-column: 1 / -1;">
                        <p class="vp-field-label">Address</p>
                        <p class="vp-field-value {{ $user->address ? '' : 'empty' }}">{{ $user->address ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>
            <div class="vp-section">
                <h3 class="vp-section-title"><i class="fas fa-shield-alt"></i> Emergency Contact</h3>
                <div style="display: grid; gap: 14px;">
                    <div class="vp-field">
                        <p class="vp-field-label">Contact Name</p>
                        <p class="vp-field-value {{ $user->emergency_contact_name ? '' : 'empty' }}">{{ $user->emergency_contact_name ?? 'Not provided' }}</p>
                    </div>
                    <div class="vp-field">
                        <p class="vp-field-label">Contact Phone</p>
                        <p class="vp-field-value {{ $user->emergency_contact_phone ? '' : 'empty' }}">{{ $user->emergency_contact_phone ?? 'Not provided' }}</p>
                    </div>
                    <div class="vp-field">
                        <p class="vp-field-label">Education Level</p>
                        <p class="vp-field-value {{ $user->education_level ? '' : 'empty' }}">{{ $user->education_level ? str_replace('_', ' ', ucfirst($user->education_level)) : 'Not provided' }}</p>
                    </div>
                    <div class="vp-field">
                        <p class="vp-field-label">How did they hear about us?</p>
                        <p class="vp-field-value {{ $user->heard_about_us ? '' : 'empty' }}">{{ $user->heard_about_us ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Documents --}}
        <div class="vp-section">
            <h3 class="vp-section-title"><i class="fas fa-file-upload"></i> Uploaded Documents ({{ $documents->count() }})</h3>
            @if($documents->count())
                <table class="vp-table">
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Status</th>
                            <th>Uploaded</th>
                            <th>Feedback</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $doc)
                            <tr>
                                <td><strong>{{ $doc->document_name }}</strong></td>
                                <td>
                                    <span class="vp-status" style="background: {{ match($doc->status) { 'approved' => '#16a34a', 'rejected' => '#c1121f', default => '#f5a524' } }}15; color: {{ match($doc->status) { 'approved' => '#16a34a', 'rejected' => '#c1121f', default => '#f5a524' } }};">
                                        {{ ucfirst($doc->status) }}
                                    </span>
                                </td>
                                <td>{{ $doc->created_at->format('M d, Y') }}</td>
                                <td>{{ $doc->admin_feedback ?? '—' }}</td>
                                <td>
                                    @if($doc->file_path)
                                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="vp-file-link">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        &nbsp;
                                        <a href="{{ asset('storage/' . $doc->file_path) }}" download class="vp-file-link">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    @else
                                        <span class="empty" style="color: var(--text-light); font-style: italic;">No file</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="vp-empty">
                    <i class="fas fa-file"></i>
                    <p>No documents uploaded yet</p>
                </div>
            @endif
        </div>

        {{-- Enrollments --}}
        <div class="vp-section">
            <h3 class="vp-section-title"><i class="fas fa-user-graduate"></i> Enrollments ({{ $enrollments->count() }})</h3>
            @if($enrollments->count())
                <table class="vp-table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th>Payment</th>
                            <th>Enrolled</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollments as $enr)
                            <tr>
                                <td><strong>{{ $enr->course->name ?? 'N/A' }}</strong></td>
                                <td>
                                    <span class="vp-status" style="background: {{ match($enr->status) { 'active' => '#16a34a', 'completed' => '#091c3d', 'suspended' => '#c1121f', default => '#f5a524' } }}15; color: {{ match($enr->status) { 'active' => '#16a34a', 'completed' => '#091c3d', 'suspended' => '#c1121f', default => '#f5a524' } }};">
                                        {{ ucfirst($enr->status) }}
                                    </span>
                                </td>
                                <td>{{ $enr->progress_percentage ?? 0 }}%</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $enr->payment_status ?? 'pending')) }}</td>
                                <td>{{ $enr->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="vp-empty">
                    <i class="fas fa-user-graduate"></i>
                    <p>Not enrolled in any courses</p>
                </div>
            @endif
        </div>

        {{-- Two Column: Grades + Transactions --}}
        <div class="vp-grid">
            {{-- Grades --}}
            <div class="vp-section">
                <h3 class="vp-section-title"><i class="fas fa-chart-bar"></i> Recent Grades ({{ $grades->count() }})</h3>
                @if($grades->count())
                    <table class="vp-table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>CA</th>
                                <th>Exam</th>
                                <th>Total</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grades as $grade)
                                <tr>
                                    <td><strong>{{ $grade->course->name ?? 'N/A' }}</strong></td>
                                    <td>{{ $grade->ca_mark ?? '—' }}</td>
                                    <td>{{ $grade->exam_mark ?? '—' }}</td>
                                    <td>{{ $grade->total_mark ?? '—' }}</td>
                                    <td>
                                        <span class="vp-status" style="background: {{ match($grade->grade_letter) { 'A','B' => '#16a34a', 'C' => '#f5a524', 'F' => '#c1121f', default => '#64748b' } }}15; color: {{ match($grade->grade_letter) { 'A','B' => '#16a34a', 'C' => '#f5a524', 'F' => '#c1121f', default => '#64748b' } }};">
                                            {{ $grade->grade_letter ?? '—' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="vp-empty">
                        <i class="fas fa-chart-bar"></i>
                        <p>No grades recorded yet</p>
                    </div>
                @endif
            </div>

            {{-- Transactions --}}
            <div class="vp-section">
                <h3 class="vp-section-title"><i class="fas fa-credit-card"></i> Recent Transactions ({{ $transactions->count() }})</h3>
                @if($transactions->count())
                    <table class="vp-table">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $txn)
                                <tr>
                                    <td><strong>{{ $txn->reference ?? '—' }}</strong></td>
                                    <td>{{ number_format($txn->amount ?? 0, 0, ',', ' ') }} XAF</td>
                                    <td>
                                        <span class="vp-status" style="background: {{ match($txn->status) { 'completed','success' => '#16a34a', 'failed' => '#c1121f', default => '#f5a524' } }}15; color: {{ match($txn->status) { 'completed','success' => '#16a34a', 'failed' => '#c1121f', default => '#f5a524' } }};">
                                            {{ ucfirst($txn->status ?? 'pending') }}
                                        </span>
                                    </td>
                                    <td>{{ $txn->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="vp-empty">
                        <i class="fas fa-credit-card"></i>
                        <p>No transactions yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-filament-panels::page>
