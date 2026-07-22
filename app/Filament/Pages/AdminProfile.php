<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Livewire\WithFileUploads;

class AdminProfile extends Page
{
    use WithFileUploads;

    protected static bool $shouldRegisterMenuItem = false;

    protected static ?string $title = 'My Profile';

    protected static ?string $slug = 'profile';

    protected string $view = 'filament.admin.pages.admin-profile';

    public User $user;
    public $avatar;
    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function getRecord(): User
    {
        return $this->user;
    }

    public function save(): void
    {
        $this->user->name = $this->name;

        if ($this->new_password) {
            $this->validate([
                'current_password' => ['required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, $this->user->password)) {
                        $fail('Current password is incorrect.');
                    }
                }],
                'new_password' => ['required', Password::defaults(), 'confirmed'],
            ]);
            $this->user->password = Hash::make($this->new_password);
        }

        if ($this->avatar) {
            $this->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($this->user->avatar_url) {
                Storage::disk('public')->delete($this->user->avatar_url);
            }
            $path = $this->avatar->store('avatars', 'public');
            $this->user->avatar_url = $path;
        }

        $this->user->save();

        Notification::make()
            ->title('Profile updated successfully')
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('editProfile')
                ->label('Edit Profile')
                ->icon('heroicon-o-pencil')
                ->color('primary')
                ->action(function () {
                    $this->dispatch('open-modal', id: 'edit-profile-modal');
                }),
        ];
    }
}
