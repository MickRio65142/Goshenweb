<?php

namespace App\Filament\Profile;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class AdminProfile extends BaseEditProfile
{
    use WithFileUploads;

    protected static string $layout = 'filament-panels::components.layout.index';

    protected string $view = 'filament.admin.profile';

    public $avatar_upload;

    public function updatedAvatarUpload()
    {
        $this->validate([
            'avatar_upload' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $path = $this->avatar_upload->store('avatars', 'public');
        $this->data['avatar_url'] = $path;
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getCurrentPasswordFormComponent(),
            ]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($this->data['avatar_url']) && filled($this->data['avatar_url'])) {
            $data['avatar_url'] = $this->data['avatar_url'];
        }
        if (isset($data['password']) && filled($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        return $data;
    }
}
