<x-filament-panels::page>
    @php
        $users = auth()->user();
        $enrollCount = \App\Models\Enrollment::where('user_id', $users->id)->count();
        $avgProgress = (int) \App\Models\Enrollment::where('user_id', $users->id)->avg('progress_percentage');
        $memberSince = $users->created_at->format('M Y');
        $liveAvatar = $this->data['avatar_url'] ?? null;
        $avatarUrl = $liveAvatar
            ? asset('storage/' . $liveAvatar)
            : ($users->avatar_url
                ? asset('storage/' . $users->avatar_url)
                : 'https://ui-avatars.com/api/?name=' . urlencode($users->name) . '&background=091c3d&color=fff&size=200');
        $pendingDocs = \App\Models\StudentDocument::where('user_id', $users->id)->where('status', 'pending')->count();
        $program = optional(\App\Models\Enrollment::where('user_id', $users->id)->with('course')->first())->course->name ?? 'No Program Assigned';
    @endphp

    <div id="dash" x-data="{ search: '', mobileSidebar: false }">
        <x-student.dash-layout title="Profile Settings">
            <div class="dash-content">
                <form wire:submit="save" class="profile-grid">
                    {{-- Left: Avatar + Summary --}}
                    <div class="space-y-5">
                        <div class="profile-card">
                            <div class="profile-avatar-wrap">
                                <img src="{{ $avatarUrl }}" alt="" class="profile-avatar" id="preview-avatar" x-data="{ src: '{{ $avatarUrl }}' }" :src="src">
                                <div class="mt-3">
                                    <input type="file" wire:model="avatar_upload" id="avatar-input" class="hidden" accept="image/*">
                                    <label for="avatar-input" class="profile-avatar-upload" wire:loading.remove wire:target="avatar_upload"><i class="fas fa-camera"></i>Change Photo</label>
                                    <span wire:loading wire:target="avatar_upload" class="text-xs text-gray-400"><i class="fas fa-spinner fa-spin mr-1"></i>Uploading...</span>
                                </div>
                                <p class="text-[11px] text-gray-400 mt-2.5">JPG, PNG or GIF. Max 2MB.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="profile-summary">
                                <div class="profile-summary-value">{{ $enrollCount }}</div>
                                <div class="profile-summary-label">Enrollments</div>
                            </div>
                            <div class="profile-summary">
                                <div class="profile-summary-value">{{ $avgProgress }}%</div>
                                <div class="profile-summary-label">Avg Progress</div>
                            </div>
                            <div class="profile-summary">
                                <div class="profile-summary-value" style="font-size:18px;">{{ $memberSince }}</div>
                                <div class="profile-summary-label">Member Since</div>
                            </div>
                            <div class="profile-summary">
                                <div class="profile-summary-value" style="font-size:18px;">{{ $pendingDocs }}</div>
                                <div class="profile-summary-label">Pending Docs</div>
                            </div>
                        </div>
                    </div>

                    {{-- Right: Form Cards --}}
                    <div class="space-y-5">
                        {{-- Account Card --}}
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <i class="fas fa-user text-gray-400 text-sm"></i>
                                <h2 class="profile-card-title">Account Information</h2>
                            </div>
                            <div class="profile-card-body space-y-4">
                                <div class="profile-field">
                                    <label class="profile-label">Full Name</label>
                                    <input type="text" class="profile-input" wire:model="data.name" placeholder="Your full name">
                                    @error('data.name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="profile-field">
                                    <label class="profile-label">Email Address</label>
                                    <input type="email" class="profile-input" wire:model="data.email" placeholder="your@email.com">
                                    @error('data.email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="profile-field">
                                    <label class="profile-label">Program</label>
                                    <div class="profile-value">{{ $program }}</div>
                                </div>
                            </div>
                        </div>

                        {{-- Security Card --}}
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                                <h2 class="profile-card-title">Change Password</h2>
                            </div>
                            <div class="profile-card-body space-y-4">
                                <div class="profile-field">
                                    <label class="profile-label">Current Password</label>
                                    <input type="password" class="profile-input" wire:model="data.currentPassword" placeholder="Enter current password">
                                    @error('data.currentPassword') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="profile-field">
                                        <label class="profile-label">New Password</label>
                                        <input type="password" class="profile-input" wire:model="data.password" placeholder="New password">
                                        @error('data.password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="profile-field">
                                        <label class="profile-label">Confirm New Password</label>
                                        <input type="password" class="profile-input" wire:model="data.passwordConfirmation" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ url('/student') }}" class="px-5 py-2.5 rounded-lg border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition">Cancel</a>
                            <button type="submit" class="px-6 py-2.5 rounded-lg text-white text-sm font-semibold transition shadow-sm profile-submit" wire:loading.attr="disabled">
                                <i class="fas fa-check mr-1.5"></i>Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </x-student.dash-layout>
    </div>
</x-filament-panels::page>