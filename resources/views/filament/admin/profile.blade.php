<x-filament-panels::page>
    @php
        $users = auth()->user();
        $liveAvatar = $this->data['avatar_url'] ?? null;
        $avatarUrl = $liveAvatar
            ? asset('storage/' . $liveAvatar)
            : ($users->avatar_url
                ? asset('storage/' . $users->avatar_url)
                : 'https://ui-avatars.com/api/?name=' . urlencode($users->name) . '&background=091c3d&color=fff&size=200');
    @endphp
    <style>
        .ap-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 28px; }
        .ap-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; padding-bottom: 14px; border-bottom: 1px solid #f3f4f6; }
        .ap-card-title { font-size: 15px; font-weight: 700; color: #111827; }
        .ap-field { margin-bottom: 18px; }
        .ap-label { display: block; font-size: 12px; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 6px; }
        .ap-input { width: 100%; border: 1px solid #d1d5db; border-radius: 8px; padding: 10px 14px; font-size: 14px; color: #111827; transition: border-color .15s, box-shadow .15s; }
        .ap-input:focus { outline: none; border-color: #091c3d; box-shadow: 0 0 0 3px rgba(9,28,61,.1); }
        .ap-avatar-wrap { text-align: center; padding: 24px; }
        .ap-avatar { width: 110px; height: 110px; border-radius: 50%; object-fit: cover; border: 3px solid #e5e7eb; margin: 0 auto 14px; }
        .ap-upload-label { display: inline-block; padding: 8px 20px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #fff; background: #091c3d; cursor: pointer; transition: background .15s; }
        .ap-upload-label:hover { background: #c1121f; }
        .ap-submit { padding: 10px 28px; border-radius: 8px; font-size: 14px; font-weight: 600; color: #fff; background: #091c3d; border: none; cursor: pointer; transition: background .15s; }
        .ap-submit:hover { background: #c1121f; }
        .ap-submit:disabled { opacity: .5; cursor: not-allowed; }
    </style>
    <div id="dash" x-data="{ mobileSidebar: false }">
        <x-admin.dash-layout title="Profile Settings">
            <div class="dash-content" style="max-width: 720px; margin: 0 auto;">
                <div style="font-size: 20px; font-weight: 700; color: #111827; margin-bottom: 24px; padding-bottom: 14px; border-bottom: 2px solid #091c3d;">
                    <i class="fas fa-user-cog text-[#c1121f] mr-2"></i> Profile Settings
                </div>

                <form wire:submit="save">
                    {{-- Avatar Card --}}
                    <div class="ap-card mb-6">
                        <div class="ap-avatar-wrap">
                            <img src="{{ $avatarUrl }}" alt="" class="ap-avatar" id="preview-avatar"
                                 x-data="{ src: '{{ $avatarUrl }}' }" :src="src">
                            <div class="mt-3">
                                <input type="file" wire:model="avatar_upload" id="avatar-input" class="hidden" accept="image/*">
                                <label for="avatar-input" class="ap-upload-label" wire:loading.remove wire:target="avatar_upload">
                                    <i class="fas fa-camera mr-1.5"></i>Change Photo
                                </label>
                                <span wire:loading wire:target="avatar_upload" class="text-xs text-gray-400">
                                    <i class="fas fa-spinner fa-spin mr-1"></i>Uploading...
                                </span>
                            </div>
                            <p class="text-[11px] text-gray-400 mt-2.5">JPG, PNG or GIF. Max 2MB.</p>
                        </div>
                    </div>

                    {{-- Account Info --}}
                    <div class="ap-card mb-6">
                        <div class="ap-card-header">
                            <i class="fas fa-user text-gray-400 text-sm"></i>
                            <h2 class="ap-card-title">Account Information</h2>
                        </div>
                        <div class="ap-card-body">
                            <div class="ap-field">
                                <label class="ap-label">Full Name</label>
                                <input type="text" class="ap-input" wire:model="data.name" placeholder="Your full name">
                                @error('data.name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="ap-field">
                                <label class="ap-label">Email Address</label>
                                <input type="email" class="ap-input" wire:model="data.email" placeholder="your@email.com">
                                @error('data.email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Password Card --}}
                    <div class="ap-card mb-6">
                        <div class="ap-card-header">
                            <i class="fas fa-lock text-gray-400 text-sm"></i>
                            <h2 class="ap-card-title">Change Password</h2>
                        </div>
                        <div class="ap-card-body">
                            <div class="ap-field">
                                <label class="ap-label">Current Password</label>
                                <input type="password" class="ap-input" wire:model="data.currentPassword" placeholder="Enter current password">
                                @error('data.currentPassword') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                                <div class="ap-field">
                                    <label class="ap-label">New Password</label>
                                    <input type="password" class="ap-input" wire:model="data.password" placeholder="New password">
                                    @error('data.password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="ap-field">
                                    <label class="ap-label">Confirm New Password</label>
                                    <input type="password" class="ap-input" wire:model="data.passwordConfirmation" placeholder="Confirm password">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                        <button type="submit" class="ap-submit" wire:loading.attr="disabled">
                            <i class="fas fa-check mr-1.5"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </x-admin.dash-layout>
    </div>
</x-filament-panels::page>
