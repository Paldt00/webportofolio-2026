<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profile Information')
                    ->description('Update your account\'s profile information and avatar.')
                    ->schema([
                        Forms\Components\FileUpload::make('avatar_url')
                            ->label('Avatar')
                            ->directory('avatars')
                            ->image()
                            ->avatar() // Menjadikan tampilan upload bulat/elegan
                            ->columnSpanFull(),

                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                    ])->columns(2),

                Forms\Components\Section::make('Update Password')
                    ->description('Ensure your account is using a long, random password to stay secure.')
                    ->schema([
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])->columns(2),
            ]);
    }
}
