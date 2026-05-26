<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Profile Data';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('profile_photo')
                ->label('Profile Picture') // Diubah jadi Profile Picture
                ->image()
                ->directory('profile')
                ->columnSpanFull(),

            Forms\Components\TextInput::make('headline')
                ->label('Name') // Diubah jadi Name
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('about_me')
                ->label('Deskripsi')
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('profile_photo')->label('Profile Picture'), // Ditambahkan label Profile Picture di tabel
            Tables\Columns\TextColumn::make('headline')->label('Name')->searchable(), // Diubah jadi Name
        ])->actions([Tables\Actions\EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
